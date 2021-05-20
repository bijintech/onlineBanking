<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class investmentTransactions extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllinvestmentTransactions($condition, $id = 'id', $desc = "desc"){
        return investmentTransactions::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleinvestmentTransactions($condition){
        return investmentTransactions::where($condition)->first();
    }
    
}
