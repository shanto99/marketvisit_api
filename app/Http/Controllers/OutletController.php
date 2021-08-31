<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function create_outlet(Request $request)
    {
        $request->validate([
           'OutletCode' => 'required|unique:Outlets',
           'OutletName' => 'required',
            'OutletAddress' => 'required',
            'ContactPerson' => 'required',
            'OutletPhone' => 'required|unique:Outlets',
            'AssignedSR' => 'required',
            'TerritoryID' => 'required'
        ]);

        $outlet = Outlet::create($request->only('OutletCode', 'OutletName',
            'OutletAddress', 'ContactPerson', 'OutletPhone', 'AssignedSR', 'TerritoryID'));

        return response()->json([
            'data' => [
                'outlet' => $outlet
            ],
            'status' => 200
        ], 200);
    }

    public function get_outlets()
    {
        $outlets = Outlet::with('territory')->get();

        return response()->json([
           'data' => [
               'outlets' => $outlets
           ],
            'status' => 200
        ], 200);
    }
}
