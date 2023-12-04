<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        $apiKeyUser = $request->header('api-key');

        $apiKey = ApiKey::all()->first();
        if ($apiKeyUser !== $apiKey->api_key ) {
            return response()->json(['error' => 'API key no válida'], 401);
        }

        return $next($request);
    }
}
