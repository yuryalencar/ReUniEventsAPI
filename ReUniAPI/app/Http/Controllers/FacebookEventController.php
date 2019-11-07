<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Facebook\FacebookClient;
use Facebook\FacebookRequest;
use Illuminate\Http\Request;

class FacebookEventController extends Controller
{
    public function getEvents()
    {
        try {
            $eventPageSlug = 'PaginaProgramaC';
            $accessToken = 'EAAMl4sCl5d4BAOSelrQVNwiznKtZCuZAIC8CMZBthjzrSUENszPHGpZBtqBbDYZBzJ7lqcCHIamEB7UBFYEkZAvtQEQ4T00qz5e4YUhbuyalOchk5Krkxuexd9UxoaL32uUZCOVeWfd27IZAgcMdGxYjZC9cs3YWBCfgnANtB7Wild6Ouzl0IQYWBZARCjpOtgMZABkpqBQzyZALGGDxdUpMvqGQKFFF0VrWrbsbHItYfZA4FhwZDZD';

            $fb = new Facebook([
                'app_id' => '886080755066334',
                'app_secret' => 'd21359829b58410807733a094d672a62',
            ]);

            $response = $fb->get(
                '/' . $eventPageSlug . '/events/',
                $accessToken
            );
            dd($accessToken);

//            $accessToken = 'EAAMl4sCl5d4BAETbaKNDJX9qSRY2KBb4phHm0MGu0LJWdXnpNBafZABeqQRple6SPhozPTaVEEFnVpEbW9dQrMT0Dk7yk3ocQGZAlyreoKjygm6ZCr2ZByO8k8cZCrNlprMZCONNagfrOIkUzZCbtXAEpLE0yTwoq1AzhGi4fC43zV33TQ1GoxZB5ELZANJMWuUvoBvsTXQPO6QZDZD';



            // Returns a `FacebookFacebookResponse` object

//            $response = $fb->get("/me/accounts", $accessToken);
//            $accounts = $response->getGraphEdge();

//            $string = '';

//            foreach ($accounts as $account) {
//                $string = $string . "ID => " . $account['id'] . "\n";
//                $string = $string . "Name => " . $account['name'] . "\n";
//                $string = $string . "Access Token => " . $account['access_token'] . "\n";
//                $string = $string . "--------------\n";
//            }
//
//            dd($string);

        } catch (FacebookResponseException $e) {
            return response()->json(['message' => 'Graph returned an error: ' . $e->getMessage()])->setStatusCode(400) ;
        } catch (FacebookSDKException $e) {
            return response()->json(['message' => 'Facebook SDK returned an error: ' . $e->getMessage()])->setStatusCode(400) ;
        }
        $responseInJson = json_decode($response->getBody(), true);
        return $responseInJson;
//        $graphNode = $response->getGraphNode();
    }

    public function storeEvents()
    {
        try {
            $eventPageSlug = 'PaginaProgramaC';
            $accessToken = 'EAAMl4sCl5d4BAOSelrQVNwiznKtZCuZAIC8CMZBthjzrSUENszPHGpZBtqBbDYZBzJ7lqcCHIamEB7UBFYEkZAvtQEQ4T00qz5e4YUhbuyalOchk5Krkxuexd9UxoaL32uUZCOVeWfd27IZAgcMdGxYjZC9cs3YWBCfgnANtB7Wild6Ouzl0IQYWBZARCjpOtgMZABkpqBQzyZALGGDxdUpMvqGQKFFF0VrWrbsbHItYfZA4FhwZDZD';
            $fb = new Facebook([
                'app_id' => '886080755066334',
                'app_secret' => 'd21359829b58410807733a094d672a62',
            ]);
            $response = $fb->get("/me/accounts", $accessToken);
            $accounts = $response->getGraphEdge();

            $string = '';

            foreach ($accounts as $account) {
                $string = $string . "ID => " . $account['id'] . "\n";
                $string = $string . "Name => " . $account['name'] . "\n";
                $string = $string . "Access Token => " . $account['access_token'] . "\n";
                $string = $string . "--------------\n";
            }

            dd($string);
//
        } catch (FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $responseInJson = json_decode($response->getBody(), true);
        return $responseInJson;
    }
}
