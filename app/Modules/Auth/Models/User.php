<?php

namespace App\Modules\Auth\Models;

/**
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string fullName
 * @property int role
 * @property int status
 * @property string email
 * @property string password
 * @property mixed|string|null image
 */

class User extends \App\Models\User
{
    const ROLE_BASIC_USER = 0;
    const ROLE_PARTNER = 1;
    const ROLE_ADMIN = 2;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;

    /**
     * @var array|string[]
     */
    public static array $roles = [
        self::ROLE_BASIC_USER => 'Basic',
        self::ROLE_PARTNER => 'Partner',
        self::ROLE_ADMIN => 'Admin',
    ];

    /**
     * @var array|string[]
     */
    public static array $statuses = [
        self::STATUS_INACTIVE => 'Inactive',
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_PENDING => 'Pending',
    ];
}
