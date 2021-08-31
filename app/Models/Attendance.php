<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "Attendances";
    protected $primaryKey = "AttendanceID";

    protected $fillable = [
        'SnapperID', 'OutletCode', 'Lat', 'Lng'
    ];
}
