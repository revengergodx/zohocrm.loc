<?php

namespace App\Service;


use Illuminate\Support\Facades\Http;

class TokenService
{
    public function getAccessToken()
    {
        $clientId = ''; //enter here your clientId
        $clientSecret = ''; //enter here your clientSecret
        $refreshToken = ''; //enter your refresh token
        $grant_type = 'refresh_token';

        $response = Http::post('https://accounts.zoho.eu/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&grant_type=' . $grant_type,);
        $response = json_decode($response)->access_token;

        return $response;
    }

}
