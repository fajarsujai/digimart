<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function getOutlets(Request $request)
    {
        $outlet = new Outlet();
        return $outlet->getOutlets($request->lat, $request->lng, $request->rad)->get();
    }
}
