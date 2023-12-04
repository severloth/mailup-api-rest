<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function getApiKey()
    {
        $apiKey = ApiKey::first();
        return response()->json([
            'apiKey' => $apiKey->api_key
        ], 200);
    }
}
