@extends('layouts.admin.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

@section('title')
Digimart | Create Outlet Page
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
            <h3 class="text-white mb-0">Tambah Outlet</h3>
          </div>
          {{-- awal form --}}
          <div style="padding:20px">
            <form method="POST" action="{{ route('outlet.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="outlet_name" placeholder="Nama Outlet" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="outlet_phone" placeholder="Phone" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="link_ig" placeholder="Link Ig" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="link_wa" placeholder="Link Wa" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="outlet_owner" placeholder="Nama Pemilik" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="file" name="outlet_image" class="form-control-file" id="">
                      </div>
                    </div>
                </div>
                <div class="row">
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
@include('layouts.admin.footers.nav')
@endsection
