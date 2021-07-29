<?php

declare(strict_types=1);

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function userInit(User $user): bool;
}
