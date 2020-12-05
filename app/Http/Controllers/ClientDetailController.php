<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class ClientDetailController extends Controller
{

    public function outletDetail()
    {
        return view('pages.detail-toko');
    }

    // public function outletDetail($slug)
    // {
    //     $outlet = Outlet::where([['slug', $slug])->first();
    //     $otlets = Outlet::where([['id', '!=', $outlet->id])->get();
    //     return view('pages.detail-toko', compact('outlet', 'outlets'));
    // }
}
