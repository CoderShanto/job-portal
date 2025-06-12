<?php

use App\Http\Middleware\RedirectIfAuthenticatedToProfile;
use App\Http\Middleware\CustomAuth;

return [
    'guest.to.profile' => RedirectIfAuthenticatedToProfile::class,
    'custom.auth' => CustomAuth::class,
];
