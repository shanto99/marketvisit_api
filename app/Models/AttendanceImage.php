<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceImage extends Model
{
    use HasFactory;
    protected $table = "AttendanceImages";
    protected $fillable = ['AttendanceID', 'ImagePath'];
}
