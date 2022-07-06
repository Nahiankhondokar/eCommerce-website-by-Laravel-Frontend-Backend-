<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipState extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationship for getting division name
    public function division(){
        return $this -> belongsTo(ShipDivision::class, 'division_id', 'id');
    }

    // Relationship for getting drstrict name
    public function district(){
        return $this -> belongsTo(ShipDistrict::class, 'district_id', 'id');
    }


}
