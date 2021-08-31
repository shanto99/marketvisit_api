<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $table = "Zones";
    protected $primaryKey = "ZoneID";
    public $incrementing = false;

    protected $fillable = ['ZoneID', 'Zone'];
}
