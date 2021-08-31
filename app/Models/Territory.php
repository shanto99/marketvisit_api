<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    use HasFactory;
    protected $table = "Territories";
    protected $primaryKey = "TerritoryID";
    public $keyType = "string";
    public $incrementing = false;

    protected $fillable = ['TerritoryID', 'Territory', 'ZoneID'];
}
