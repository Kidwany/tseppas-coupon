<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait ApiToken
{
    public function generateApiToken()
    {
        return Str::random(300);
    }

    public function revokeToken(){
        $user = \auth()->user();
        $user->api_token = null;
        $user->save();
        return true;
    }
}
