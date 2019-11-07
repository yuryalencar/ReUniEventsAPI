<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::all());
    }

    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @param $partialName
     * @return PersonResourceCollection
     */
    public function byName($partialName): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::where('name', 'like', '%' . $partialName . '%')->paginate());
    }

    /**
     * @param $amount
     * @return PersonResourceCollection
     */
    public function perpage($amount): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate($amount));
    }

    /**
     * @param PersonRequest $request
     * @return PersonResource|\Illuminate\Http\JsonResponse
     */
    public function store(PersonRequest $request)
    {
        try {
            $dataToStore = [
                'name' => $request->input('name'),
                'expires_at' => null,
                'facebook_token' => ''
            ];

            $fb = new Facebook([
                'app_id' => '886080755066334',
                'app_secret' => 'd21359829b58410807733a094d672a62',
            ]);

            $oAuth2Client = $fb->getOAuth2Client();
            $accessToken = $oAuth2Client->getLongLivedAccessToken($request->input('facebook_token'));

            $dataToStore['facebook_token'] = $accessToken->getValue();
            $dataToStore['expires_at'] = $accessToken->getExpiresAt();

            $person = Person::create($dataToStore);

            return new PersonResource($person);
        } catch (FacebookResponseException $e) {
            return response()->json(['message' => 'Graph returned an error: ' . $e->getMessage()])->setStatusCode(400);
        } catch (FacebookSDKException $e) {
            return response()->json(['message' => 'Facebook SDK returned an error: ' . $e->getMessage()])->setStatusCode(400);
        }
    }

    /**
     * @param Person $person
     * @param PersonRequest $request
     * @return PersonResource
     */
    public function update(Person $person, PersonRequest $request): PersonResource
    {
        $person->update($request->all());

        return new PersonResource($person);
    }

    public function destroy(Person $person)
    {
        $pages = $person->pages;
        for ($i = 0; $i < count($pages); $i++) {
            $pages[$i]->delete();
        }
        $person->delete();

        return response()->json();
    }
}
