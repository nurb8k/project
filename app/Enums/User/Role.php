<?php

namespace App\Enums\User;
use BenSampo\Enum\Enum;

class Role extends Enum
{
const Admin = 'admin';
const Moderator = 'moderator';
const User = 'user';
const SuperAdmin = 'super-admin';
const Manager = 'manager';
}