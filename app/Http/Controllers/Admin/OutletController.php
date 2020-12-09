<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(" SELECT o.outlet_name, o.outlet_phone, o.slug, o.outlet_owner, o.note ,o.link_wa, o.updated_at 
                            FROM outlets o order by o.id desc
                    ");
        return view('pages.admin.outlet.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, []);

        $param = $request->all();
        $data = [
            'outlet_name'   => $param['outlet_name'],
            'slug'          => Str::slug($param['outlet_name']),
            'outlet_phone'  => $param['outlet_phone'],
            'outlet_owner'  => $param['outlet_owner'],
            'note'  => $param['note'],
            'link_wa'       => $param['link_wa'],
            'link_ig'       => $param['link_ig']
        ];

        $file_photo = $request->file('outlet_image');
        $str = rand();
        $random_str = md5($str);
        if ($file_photo) {
            $filename = $random_str . $file_photo->getClientOriginalName();
            $data['outlet_image'] = $filename; // Update field photo

            $file_photo->move('images/outlet', $filename);
        } else {
            dd("tidak ada image");
        }

        Outlet::create($data);
        return redirect()->back()->with(['status' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = DB::select(" SELECT o.outlet_name, o.outlet_phone, o.slug, o.outlet_owner, o.note ,o.link_wa, o.updated_at, o.link_ig 
                            FROM outlets o
                            WHERE o.slug='".$slug."' 
                    ");
        $data = $data[0];
        return view('pages.admin.outlet.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
        $param = $request->all();

        $data = [
            'outlet_name'    => $param['outlet_name'],
            'slug'           => Str::slug($param['outlet_name']),            
            'outlet_phone'   => $param['outlet_phone'],
            'link_ig'        => $param['link_ig'],
            'link_wa'        => $param['link_wa'],
            'outlet_owner'   => $param['outlet_owner'],
            'note'           => $param['note'],
        ];

        $file_photo = $request->file('outlet_image');

        // Kalo pas diedit gambar diganti / masukin gambar
        $str = rand();
        $random_str = md5($str);
        if ($file_photo) {
            $outlet = Outlet::where('slug',$slug)->first();
            File::delete('backend/images/outlets/' . $outlet->outlet_image);
            $filename = $random_str . $file_photo->getClientOriginalName();
            $data['outlet_image'] = $filename; // Update field photo

            $file_photo->move('backend/images/outlets/', $filename);
        }

        // upload file
        DB::table('outlets')->where('slug', '=', $slug)->update($data);
        return redirect()->route('outlet.index')->with(['status' => 'Data Berhasil Diupdate!']);
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
