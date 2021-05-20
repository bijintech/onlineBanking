<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userWallets extends Model
{
    use HasFactory;

    public function getAllUserWallets($condition, $id = 'id', $desc = "desc"){
        return userWallets::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleUserWallets($condition){
        return userWallets::where($condition)->first();
    } 

}
