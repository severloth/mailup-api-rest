<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\ApiKey;

class RotateApiKeys extends Command
{
    protected $signature = 'api-keys:rotate';
    protected $description = 'Rotar las claves de API';

    public function handle()
    {
        $currentKey = ApiKey::first()->api_key;

        $lastDigit = substr($currentKey, -1);

        $randomDigit = rand(0, 9);

        if($randomDigit != $lastDigit) {
            $newKey = substr_replace($currentKey, $randomDigit, -1);
            ApiKey::first()->update(['api_key' => $newKey]);
            $this->info('Rotación de claves de API completada con éxito.');
        }

    }
}
