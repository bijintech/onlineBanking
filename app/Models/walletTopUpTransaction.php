<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class walletTopUpTransaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllWalletTopUpTransaction($condition, $id = 'id', $desc = "desc"){
        return walletTopUpTransaction::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleWalletTopUpTransaction($condition){
        return walletTopUpTransaction::where($condition)->first();
    } 
}
