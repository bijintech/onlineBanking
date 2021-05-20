<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class currencyList extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllCurrencyList($id = 'id', $desc = "desc"){
        return currencyList::orderBy($id, $desc)->get();
    }

    public function getSingleCurrencyList($condition){
        return currencyList::where($condition)->first();
    }
}
