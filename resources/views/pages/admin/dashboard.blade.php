@extends('layouts.admin.app')

@section('title')
Digimart | Dashboard Page
@endsection

@section('content')
    @include('layouts.admin.headers.cards')

    <div class="container-fluid mt--7">


        @include('layouts.admin.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend') }}argon/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('backend') }}argon/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
