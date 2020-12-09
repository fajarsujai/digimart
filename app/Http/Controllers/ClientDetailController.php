<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientDetailController extends Controller
{

    public function outletDetail($slug)
    {
        $data = DB::select(" SELECT o.outlet_name, o.slug, o.outlet_owner, o.outlet_phone, o.outlet_image, o.note, p.product_description, p.product_images, c.category_name
                            FROM outlets o
                            LEFT JOIN products p ON o.id=p.outlet_id
                            LEFT JOIN product_categories c ON p.product_category_id=c.id
                            WHERE o.slug = '".$slug."'
         ");
        $data = $data[0];        
        return view('pages.detail-toko',['data'=>$data]);
    }

    // public function outletDetail($slug)
    // {
    //     $outlet = Outlet::where([['slug', $slug])->first();
    //     $otlets = Outlet::where([['id', '!=', $outlet->id])->get();
    //     return view('pages.detail-toko', compact('outlet', 'outlets'));
    // }
}
