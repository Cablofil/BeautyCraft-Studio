<?php

namespace App\TestFolder;

class UserController
{
    public function handle()
    {
        $repo = new UserRepository();

        $user = $repo->findByEmail('addmi@admin.com');
            if (empty($user)) {
                throw new \Exception ('user not found');
            }
        return <<<RESPONSE
        user name: $user->name
        RESPONSE;
    }
}