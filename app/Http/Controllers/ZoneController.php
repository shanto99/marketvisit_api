<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function create_zone(Request $request)
    {
        $request->validate([
           'ZoneID' => 'required',
           'Zone' => 'required'
        ]);

        $zone = Zone::create([
           'ZoneID' => $request->ZoneID,
           'Zone' => $request->Zone
        ]);

        return response()->json([
          'data' => [
              'zone' => $zone
          ],
          'status' => 200
        ], 200);
    }

    public function get_zones()
    {
        $zones = Zone::all();
        return response()->json([
            'data' => [
                'zones' => $zones
            ],
            'status' => 200
        ], 200);
    }

    public function get_territories()
    {
        $territories = Territory::all();
        return response()->json([
            'data' => [
                'territories' => $territories
            ],
            'status' => 200
        ], 200);
    }
}
