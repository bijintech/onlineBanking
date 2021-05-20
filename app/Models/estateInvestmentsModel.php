<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class estateInvestmentsModel extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getAllEstateInvestments($condition, $id = 'id', $desc = "desc"){
        return estateInvestmentsModel::where($condition)->orderBy($id, $desc)->get();
    }

    public function getSingleEstateInvestments($condition){
        return estateInvestmentsModel::where($condition)->first();
    } 

    public function getEstateInvestmentsByPaginate($number, $condition = null, $id = 'id', $desc = 'desc'){

        return estateInvestmentsModel::where($condition)->orderBy($id, $desc)->simplePaginate($number);

    }


}
