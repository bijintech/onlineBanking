<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accountDepositTransaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllAccountDepositTransaction($condition, $id = 'id', $desc = "desc"){
        return accountDepositTransaction::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleAccountDepositTransaction($condition){
        return accountDepositTransaction::where($condition)->first();
    } 
    
    public function getLastestAccountDepositTransaction($condition){
        return accountDepositTransaction::where($condition)->latest()->first();
    }
}
