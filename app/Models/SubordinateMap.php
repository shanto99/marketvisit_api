<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubordinateMap extends Model
{
    use HasFactory;
    protected $table = "SubordinateMaps";
    protected $primaryKey = "MapID";

    protected $fillable = ['SupervisorID', 'SubordinateID'];
}
