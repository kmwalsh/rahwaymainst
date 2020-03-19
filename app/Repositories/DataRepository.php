<?php

namespace App\Repositories;

use App\User;
use App\Business;

class DataRepository {

    public function forUser(User $user)
    {
        $data = array();

        $data['businesses'] = Business::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();

        return $data;
    }

}