<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::all();
        $categories = ProductCategory::all();
        return view('pages.admin.product.create', compact('outlets', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $images = array();
        $str = rand();
        $random_str = md5($str);
        if ($files = $request->file('product_image')) {
            foreach ($files as $file) {
                $name = $random_str . $file->getClientOriginalName();
                $file->move('images/products', $name);
                $images[] = $name;
            }
        }

        $product_image = implode(",", $images);
        $data = [
            "product_description" => $request->post('product_description'),
            "outlet_id"           => $request->post('outlet_id'),
            "product_category_id" => $request->post('product_category_id'),
            "product_images"      => $product_image
        ];
        // dd($data);
        Product::create($data);
        return redirect()->back()->with(['status' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
