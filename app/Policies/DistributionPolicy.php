<?php

namespace App\Policies;

use App\Models\Distribution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistributionPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Distribution $distribution){
        if($user->id == $distribution->supplier_id){
            return true;
        } else{
            return false;
        }
    }

    public function published(?User $user, Distribution $distribution){
        if($distribution->status == 2){
            return true;
        } else{
            return false;
        }
    }
}
