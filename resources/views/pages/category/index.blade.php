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
  <div class="container-fluid mt--6">
    <!-- Dark table -->
    <br><br><br><br><br>
    <div class="row">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Tabel Kategori</h3>
            <a class="btn btn-warning" href="{{ route('category.create') }}">Create</a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th scope="col" class="sort" data-sort="name">Nama Kategori</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
              </tbody>
            </table>
          </div>
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