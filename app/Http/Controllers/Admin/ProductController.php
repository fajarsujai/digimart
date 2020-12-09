<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select("SELECT o.outlet_name, c.category_name, p.id, p.product_description, p.product_images, p.updated_at 
                            FROM products p
                            LEFT JOIN outlets o ON p.outlet_id=o.id
                            LEFT JOIN product_categories c ON p.product_category_id=c.id
                            ORDER BY p.id desc
                            ");

      
        return view('pages.admin.product.index', ['data' => $data]);
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
        $data = DB::select("SELECT o.id oid, o.outlet_name, c.id cid, c.category_name, p.id pid, p.product_description, p.product_images, p.updated_at 
                            FROM products p
                            LEFT JOIN outlets o ON p.outlet_id=o.id
                            LEFT JOIN product_categories c ON p.product_category_id=c.id
                            WHERE p.id='".$id."'
                            ");

        $data = $data[0];

        $outlets = Outlet::all();
        $categories = ProductCategory::all();

        return view('pages.admin.product.edit', ['data' => $data, 'outlets' => $outlets, 'categories' => $categories]);
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
        // // Kalo pas diedit gambar diganti / masukin gambar
        $file_photo = $request->file('product_images');
        $images = array();
        if ($file_photo) {
            // proses hapus image lama pada server
            $product = Product::find($id);
            $product_images = explode(",",$product->product_images);
            foreach ($product_images as $value) {
                File::delete('backend/images/outlets/' . $value);
            }            
            
            // menambahkan kan gambar baru di update
            $str = rand();
            $random_str = md5($str);
            foreach ($file_photo as $file) {
                $name = $random_str . $file->getClientOriginalName();
                $file->move('backend/images/products', $name);
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

        // upload file
        DB::table('products')->where('id', '=', $id)->update($data);
        return redirect()->route('product.index')->with(['status' => 'Data Berhasil Diupdate!']);
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
