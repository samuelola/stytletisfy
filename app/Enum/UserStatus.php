<?php

namespace App\Enum;

enum UserStatus: Int
{
    case SUPERADMIN = 1;
    case ADMIN = 2;
    case VENDOR = 3;
    case USER = 4;
}
