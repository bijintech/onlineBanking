<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accountTypeModel extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllAccountType($condition, $id = 'id', $desc = "desc"){
        return accountTypeModel::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleAccountType($condition){
        return accountTypeModel::where($condition)->first();
    }
}
