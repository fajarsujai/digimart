@extends('layouts.app')

@section('title')
Deeantar.com
@endsection

@section('content')
<br><br><br>
<section class="section-show">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Deeantar : </div>

                <div class="card-body">
                    <div style="height: 500px;display:none" id="mapContainer"></div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div id="summary"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('script')
    <script>
        window.action = "direction"
    </script>
@endpush
