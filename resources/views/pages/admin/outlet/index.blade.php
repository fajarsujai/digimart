@extends('layouts.admin.app', ['activePage' => 'table', 'titlePage' => __('Tabel Daftar Paket')])

@section('title')
Digimart | Outlet Page
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
            <h3 class="text-white mb-0">Table Outlet</h3>
            <a class="btn btn-warning" href="{{ route('outlet.create') }}">Create</a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="sort" data-sort="name">No</th>
                  <th scope="col" class="sort" data-sort="name">Outlet</th>
                  {{-- <th scope="col" class="sort" data-sort="budget">Phone</th> --}}
                  <th scope="col" class="sort" data-sort="status">Owner</th>
                  <th scope="col" class="sort" data-sort="status">Note</th>
                  <th scope="col" class="sort" data-sort="status">Link Wa</th>
                  <th scope="col" class="sort" data-sort="status">Updated at</th>
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
                    {{-- <td>{{$item->outlet_phone }}</td> --}}
                    <td>{{ $item->outlet_owner }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                    <a href="{{ "https://api.whatsapp.com/send?phone=+".$item->outlet_phone."&text=".urlencode($item->note) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-info">WA</a> 
                    </td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                      <a href="{{ route('outlet.edit',$item->slug) }}" class="btn btn-warning">Edit</a>
                    </td>
                  </tr>
                  @php
                      $i++;
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
