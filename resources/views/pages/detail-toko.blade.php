@extends('layouts.app')

@section('title')
DEEANTAR | {{ $data->outlet_name }}
@endsection

@section('content')
        <x-navbar></x-navbar>
        <x-headline></x-headline>
        <main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">

                    <div class="item"><img src="{{ asset('backend/images/outlets/'.$data->outlet_image) }}" alt=""></div>
                    @php
                        $images = explode(",",$data->product_images)
                    @endphp
                    @foreach ($images as $image)
                      <div class="item"><img src="{{ asset('backend/images/products/'.$image) }}" alt=""></div>
                    @endforeach
                  </div>
                  {{-- <a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=U_o1M2yZ4dg"> --}}
                    {{-- <img src="{{ asset('frontend') }}/images/toko/sayuran/toko1/toko1.png" alt=""><i class="fa fa-play"></i></a> --}}
                </div>
                <div class="ps-product__image">
                  <div class="item"><img class="zoom" src="{{ asset('backend/images/outlets/'.$data->outlet_image) }}" alt="" data-zoom-image="{{ asset('backend/images/outlets/'.$data->outlet_image) }}"></div>
                  @foreach ($images as $image)
                      <div class="item"><img class="zoom" src="{{ asset('backend/images/products/'.$image) }}" alt="" data-zoom-image="{{ asset('backend/images/products/'.$image) }}"></div>
                  @endforeach
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img  class="zoom"  src="{{ asset('backend/images/outlets/'.$data->outlet_image) }}" alt="" data-zoom-image="{{ asset('backend/images/outlets/'.$data->outlet_image) }}"></div>
                @foreach ($images as $image)
                <div class="ps-product__preview" style="margin-bottom: 10px;">
                  <img src="{{ asset('backend/images/products/'.$image) }}" alt="">
                </div>
                @endforeach
              </div>
              <div class="ps-product__info">
                <h1>{{ $data->outlet_name }} ({{ $data->outlet_owner }})</h1>
                <p class="ps-product__category"><a href="#"> {{ $data->category_name }}</a></p>
                <div class="ps-product__block ps-product__quickview">
                  <h4>Deskripsi Toko</h4>
                  <h5>Toko ini menjual berbagai jenis {{ $data->category_name }} seperti:</h5>
                  <p>{{ $data->product_description }}</p>
                </div>
<<<<<<< HEAD
                {{-- href="{{ "https://api.whatsapp.com/send?phone=+".$data->outlet_phone."&text=".urlencode($data->product_description)."%0A%0A".urlencode($data->note) }}" --}}
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="#" onclick="openDirection({{ $data->latitude }}, {{ $data->longitude }}, {{ $data->id }})" target="_blank">Pesan Sekarang</a>
                  <div class="ps-product__actions"><a href="#"><i class="ps-icon-share"></i></a></div>
=======
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="{{ "https://api.whatsapp.com/send?phone=+".$data->outlet_phone."&text=".urlencode($data->product_description)."%0A%0A".urlencode($data->note) }}" target="_blank">Pesan Sekarang</a>
                  <div class="ps-product__shopping"><a class="ps-btn mb-10" href="{{ url('https://api.whatsapp.com/send?text=http://deeantar.decodev.id/detail-toko/'.$data->slug)}}" data-action="share/whatsapp/share">Bagikan Toko</a></div>
>>>>>>> 5d6edc39b4c63b9c71897d504fdee3d1cbd2b638
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Toko Lainnya">- Daftar Toko Lainnya</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Sebelumnya</a><a class="ps-next" href="#">Selanjutnya<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <img src="{{ asset('frontend') }}/images/toko/sayuran/toko2/toko2.png" alt=""><a class="ps-shoe__overlay" href="{{ url('detail-toko')}}"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="{{ asset('frontend') }}/images/toko/sayuran/toko1/toko1-detail-1.png" alt=""><img src="{{ asset('frontend') }}/images/toko/sayuran/toko1/toko1-detail-2.png" alt=""><img src="{{ asset('frontend') }}/images/toko/sayuran/toko1/toko1-detail-3.png" alt=""><img src="{{ asset('frontend') }}/images/toko/sayuran/toko1/toko1-detail-4.png" alt=""></div>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Toko B</a>
                      <p class="ps-shoe__categories"><a href="#">Sayuran</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <x-footer></x-footer>
@endsection

@push('addon-script')
<script type="text/javascript" src="{{ asset('frontend') }}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
@endpush

