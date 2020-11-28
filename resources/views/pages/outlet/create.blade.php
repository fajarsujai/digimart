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
            <h3 class="text-white mb-0">Tambah Outlet</h3>
          </div>
          {{-- awal form --}}
          <div style="padding:20px">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Nama Outlet" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Phone" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Link Ig" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Link Wa" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Nama Pemilik" class="form-control"/>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary btn-block">Simpan</button>
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