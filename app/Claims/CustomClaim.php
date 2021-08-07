<?php

namespace App\Claims;

use CorBosman\Passport\AccessToken;

class CustomClaim
{
    public function handle(AccessToken $token, $next)
    {
        // $token->addClaim('type', 'admin');
        $token->addClaim('type', 'user');
        return $next($token);
    }
}
