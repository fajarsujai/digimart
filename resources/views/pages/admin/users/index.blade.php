@extends('layouts.admin.app')

@section('title')
DEEANTAR | User Page
@endsection

@section('content')
  @include('layouts.admin.headers.cards-empty')
  <div class="container" style="margin-top:20px;">
    @include('components.admin.flash-message')
    <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Tabel User </h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{url('user/create')}}" class="btn btn-sm btn-info">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $value)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                              <form onsubmit="return confirm('Apakah anda yakin menghapus data ini?')" class="d-inline"
                                action="{{route('user.destroy', $value->id)}}" method="POST">
                               @csrf
                               <input type="hidden" name="_method" value="DELETE">
                               <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                              </form>
                              <a href="{{route('user.edit', $value->id)}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                    {{$users->links()}}
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
