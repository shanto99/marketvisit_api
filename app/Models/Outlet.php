<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = "Outlets";
    protected $primaryKey = "OutletCode";
    public $incrementing = false;

    protected $fillable = ['OutletCode', 'OutletName',
        'OutletAddress', 'ContactPerson', 'OutletPhone', 'AssignedSR', 'TerritoryID'];

    public function territory()
    {
       return $this->belongsTo(Territory::class, 'TerritoryID', 'TerritoryID');
    }
}
