<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    public function make_attendance(Request $request)
    {
       //http://localhost:8080/marketvisit/public/storage/attendances/Sj8dd6t84x5EtRxS3lt5i81tp2DRvIRlsyQ9Uza3.jpg
       // Sample uploaded file url to access publicly
        // if project is being served with php artisan then public should be replaced with storage
        $request->validate([
           'Images' => 'required|array|min:2',
           'OutletCode' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        $attendance = Attendance::create([
            'SnapperID' => Auth::user()->UserID,
            'OutletCode' => $request->OutletCode,
            'Lat' => $request->Lat,
            'Lng' => $request->Lng
        ]);

        foreach ($request->Images as $image) {
            $path = $image->store('public/attendances');
            AttendanceImage::create([
               'AttendanceID' => $attendance->AttendanceID,
                'ImagePath' => $path
            ]);
        }

        return response()->json([
            'message' => 'Attendance posted successfully',
            'status' => 200
        ], 200);
    }
}
