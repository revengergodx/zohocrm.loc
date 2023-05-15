<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Account\StoreRequest;
use App\Service\TokenService;
use Illuminate\Support\Facades\Http;
use TheSeer\Tokenizer\Token;

class AccountController extends Controller
{

    public function index(TokenService $service)
    {
        $accessToken = $service->getAccessToken();
        $accounts = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Accounts');
        return $accounts;
    }

    public function store(StoreRequest $request, TokenService $service)
    {
        $accessToken = $service->getAccessToken();
        $data = $request->validated();
        $data = [
            "Account_Name" => $request->Account_Name,
            "Phone" => $request->Phone,
            "Website" => $request->Website,
        ];
        $arr = ["data" => [$data]];
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->POST('https://www.zohoapis.eu/crm/v2/Accounts', $arr);

        return $response;

    }
}
