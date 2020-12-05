<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'user' => User::count(),
            'category' => ProductCategory::count(),
            'outlet' => Outlet::count(),
            'product' => Product::count()
        ]);
    }
}
