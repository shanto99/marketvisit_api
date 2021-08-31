<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    public function create_territory(Request $request)
    {
        $request->validate([
            'TerritoryID' => 'required|unique:Territories',
            'Territory' => 'required',
            'ZoneID' => 'required|exists:Zones,ZoneID'
        ]);

        $territory = Territory::create([
         'TerritoryID' => $request->TerritoryID,
         'Territory' => $request->Territory,
         'ZoneID' => $request->ZoneID
        ]);

        return response()->json([
           'data' => [
               'territory' => $territory
           ],
            'status' => 200
        ], 200);
    }
}
