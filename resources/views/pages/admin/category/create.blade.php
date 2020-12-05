@extends('layouts.admin.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

@section('title')
Digimart | Create Category Page
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
            <h3 class="text-white mb-0">Tambah Kategori</h3>
          </div>
          {{-- awal form --}}
          <div style="padding:20px">
            <form method="POST" action="{{ route('category.store') }}">
              @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" name="category_name" placeholder="Nama Kategori" class="form-control"/>
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
@include('layouts.admin.footers.nav')
@endsection
