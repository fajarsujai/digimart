@extends('layouts.admin.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

@section('title')
Digimart | Product Page
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">

          </div>
          <div class="col-lg-6 col-5 text-right">

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <!-- Dark table -->
    <br><br><br><br><br>
    <div class="row">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Tabel Produk</h3>
            <a class="btn btn-warning" href="{{ route('product.create') }}">Create</a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th scope="col">Outlet</th>
                  <th scope="col">Category</th>
                  <th scope="col">Deskripsi Produk</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                @php
                    $i=1;
                @endphp
                @foreach ($data as $item)    
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->outlet_name }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->product_description }}</td>
                    @php
                        $images = explode(",",$item->product_images);                        
                    @endphp
                    <td>{{ count($images)." Item Gambar" }}</td>                        
                      {{-- @foreach ($images as $value)                       --}}
                        {{-- <img src="{{url('backend/images/products/'.$value)}}" height="128" width="128" style="padding:10px; margin:20px;">  --}}
                      {{-- @endforeach --}}
                    <td>
                      <a href="{{ route('product.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    </tr>
                  @php
                      $i++
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
@include('layouts.admin.footers.nav')
@endsection
