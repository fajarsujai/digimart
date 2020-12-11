<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductCategory;
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

        $categories = ProductCategory::count();

        $outlets = Outlet::orderBy('id', 'desc')->take(5)->get();

        return view('pages.home', [
            'data' => $data,
            'categories' => $categories,
            'outlets' => $outlets
        ]);
    }

    public function about()
    {
        return view('pages.tentang-kami');
    }
}
