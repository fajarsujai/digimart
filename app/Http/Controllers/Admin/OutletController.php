<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.outlet.index');
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
            'link_wa'       => $param['link_wa'],
            'link_ig'       => $param['link_ig']
        ];

        $file_photo = $request->file('outlet_image');
        $str = rand();
        $random_str = md5($str);
        if ($file_photo) {
            $filename = $random_str . $file_photo->getClientOriginalName();
            $data['outlet_image'] = $filename; // Update field photo

            $proses = $file_photo->move('images/outlet', $filename);
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
