<?php

namespace App\Http\Controllers;

use App\Event;
use App\Mail\SendMailUpdateToken;
use App\Person;
use App\User;
use Carbon\Carbon;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Facebook\FacebookClient;
use Facebook\FacebookRequest;
use Facebook\GraphNodes\GraphEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FacebookEventController extends Controller
{
    public static function removeOldEvents()
    {
        Event::where('date', '<', Carbon::yesterday())->delete();
    }

    public static function notifyPeopleWithOldTokens()
    {
        $persons = Person::where('expires_at', '<', Carbon::now())->get();

        foreach ($persons as $person) {
            if ($person->required_new_token == false) {
                self::sendmail($person);
                $person->update(['expires_at' => Carbon::now()]);
                $person->update(['required_new_token' => true]);
                $person->save();
            }
        }
    }

    public static function sendmail($person)
    {
        Mail::to($person->email)->send(new SendMailUpdateToken($person));
    }

    public static function updateDatabaseEvents()
    {
        try {

            $people = Person::all();

            foreach ($people as $person) {

                try {
                    if (!Carbon::parse($person->expires_at)->lt(Carbon::now())) {
                        $pages = $person->pages;

                        foreach ($pages as $page) {
                            $fb = new Facebook([
                                'app_id' => env('FACEBOOK_APP_ID'),
                                'app_secret' => env('FACEBOOK_APP_SECRET'),
                                'default_graph_version' => env('FACEBOOK_GRAPH_API_VERSION'),
                            ]);

                            $response = $fb->get(
                                '/' . $page->slug_of_the_page . '/events?fields=description,name,place,start_time,end_time,category,cover,is_canceled',
                                $person->facebook_token
                            );
                            $events = $response->getGraphEdge();

                            foreach ($events as $event) {
                                $data = [];
                                if (Event::where('name', '=', $event['name'])->first() != null) {
                                    Event::where('name', '=', $event['name'])->first()->delete();
                                }
                                if (isset($event['name']))
                                    $data['name'] = $event['name'];
                                if (isset($event['place']['name']))
                                    $data['place'] = $event['place']['name'] . " Localizado em: " . $event['place']['location']['city'] . "-" . $event['place']['location']['state'];
                                if (isset($event['start_time']))
                                    $data['date'] = $event['start_time'];
                                if (isset($event['category']))
                                    $data['category'] = $event['category'];
                                if (isset($event['cover']['source']))
                                    $data['image'] = $event['cover']['source'];
                                if (isset($event['is_canceled']))
                                    $data['is_canceled'] = $event['is_canceled'];
                                Event::create($data);
                            }
                        }
                    }
                } catch (FacebookResponseException $e) {
                    $person->update(['expires_at' => Carbon::now()]);
                    $person->update(['required_new_token' => true]);
                    $person->save();
                    self::sendmail($person);
                } catch (FacebookSDKException $e) {
                    $person->update(['expires_at' => Carbon::now()]);
                    $person->update(['required_new_token' => true]);
                    $person->save();
                    self::sendmail($person);
                }
            }
        } catch (FacebookResponseException $e) {
            return response()->json(['message' => 'Graph returned an error: ' . $e->getMessage()])->setStatusCode(400);
        } catch (FacebookSDKException $e) {
            return response()->json(['message' => 'Facebook SDK returned an error: ' . $e->getMessage()])->setStatusCode(400);
        }
        $responseInJson = response()->json(['message' => 'all events saved'])->setStatusCode(201);
        self::removeOldEvents();
        self::notifyPeopleWithOldTokens();
        return $responseInJson;
    }
}
