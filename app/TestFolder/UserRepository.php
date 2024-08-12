<?php

namespace App\TestFolder;

use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        $db = new Db();
        $res = $db->query(
            'SELECT * FROM users where email=:email',
            [':email' => $email],
            User::class
        );

        return !empty($res) ? $res[0] : null;
    }
}