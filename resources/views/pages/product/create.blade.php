@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

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
            <h3 class="text-white mb-0">Tambah Produk</h3>
          </div>
          {{-- awal form --}}
          <div style="padding:20px">
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
              @csrf  
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="outlet">Pilih Nama Pemilik</label>
                        <select class="form-control" id="outlet" name="outlet_id">
                          <option selected disabled>~ Pilih Nama Outlet ~</option>
                          @foreach ($outlets as $item)                              
                            <option value="{{ $item->id }}">{{ $item->outlet_name }}</option> 
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
                            <option value={{ $item->id }}>{{ $item->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" id="product_description" name="product_description" rows="8" placeholder="Write a large text here ..."></textarea>
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
                        <button type="submit" class="btn btn-secondary btn-block">Simpan</button>
                    </div>
                </div>
              </form>
          </div>
          {{-- akhir form --}}
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
      <div class="copyright text-center text-xl-left text-muted">
          &copy; {{ now()->year }} <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
          <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
      </div>
        </div>
  <div class="col-xl-6">
@endsection