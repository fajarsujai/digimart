@extends('layouts.admin.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

@section('title')
DEEANTAR | Edit Product Page
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
  <div class="container mt--6">
    <!-- Dark table -->
    <br><br><br><br><br>
    <div class="row">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Edit Produk</h3>
          </div>
          {{-- awal form --}}
          <div style="padding:20px">
            <form method="post" action="{{ route('product.update',$data->pid) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="outlet">Pilih Nama Pemilik</label>
                        <select class="form-control" id="outlet" name="outlet_id">
                          <option selected disabled>~ Pilih Nama Outlet ~</option>
                          @foreach ($outlets as $item)
                            <option value="{{ $item->id }}" {{($data->oid == $item->id) ? 'Selected' : ''}}>{{ $item->outlet_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">Pilih Kategori</label>
                        <select class="form-control" id="category" name="product_category_id">
                          <option>~ Pilih Kategori ~</option>
                          @foreach ($categories as $item)
                            <option value={{ $item->id }} {{($data->cid == $item->id) ? 'Selected' : ''}}>{{ $item->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" id="product_description" name="product_description" rows="8" placeholder="Write a large text here ...">{{ $data->product_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <div class="custom-file">
                            <input type="file" name="product_image[]" class="custom-file-input" id="product_image" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-secondary btn-block">Update</button>
                    </div>
                </div>
              </form>
          </div>
          {{-- akhir form --}}
        </div>
      </div>
    </div>
    <!-- Footer -->
@include('layouts.admin.footers.nav')
@endsection
