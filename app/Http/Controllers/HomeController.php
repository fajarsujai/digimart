<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::select(" SELECT o.outlet_name, o.slug, o.outlet_image, p.product_images, c.category_name
                            FROM outlets o
                            LEFT JOIN products p ON o.id=p.outlet_id 
                            LEFT JOIN product_categories c ON p.product_category_id=c.id 
                            order by o.id desc
                        ");
        
        return view('pages.home', ['data'=>$data]);
    }

    public function about()
    {
        return view('pages.tentang-kami');
    }
}
