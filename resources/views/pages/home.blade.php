@extends('layouts.app')

@section('title')
Digimart | Beranda
@endsection

@section('content')

    <x-navbar></x-navbar>
    <x-headline></x-headline>
    <x-hero></x-hero>
    <main class="ps-main">
      <div  class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
          <div id="features" class="ps-section__header mb-50">
            <h3  class="ps-section__title" data-mask="Daftar Toko">- Daftar Toko</h3>
            <ul class="ps-masonry__filter">
              <li class="current"><a href="#" data-filter="*">Semua <sup>8</sup></a></li>
              <li><a href="#" data-filter=".vegetables">Sayuran <sup>3</sup></a></li>
              <li><a href="#" data-filter=".meat">Daging <sup>1</sup></a></li>
              <li><a href="#" data-filter=".seasoning">Bumbu <sup>2</sup></a></li>
              <li><a href="#" data-filter=".fruit">Buah-Buahan <sup>2</sup></a></li>
            </ul>
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>
                <div class="grid-item vegetables">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                        <img src="frontend/images/toko/sayuran/toko1/toko1.png" alt=""><a class="ps-shoe__overlay" href="{{ url('detail-toko')}}"></a>
                      </div>
                      <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                          <div class="ps-shoe__variant normal">
                            <img src="frontend/images/toko/sayuran/toko1/toko1-detail-1.png" alt="">
                            <img src="frontend/images/toko/sayuran/toko1/toko1-detail-2.png" alt="">
                            <img src="frontend/images/toko/sayuran/toko1/toko1-detail-3.png" alt="">
                            <img src="frontend/image/toko/sayuran/toko1/toko1-detail-4.png" alt="">
                            </div>
                        </div>
                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Toko A</a>
                          <p class="ps-shoe__categories"><a href="#">Sayuran</a></p>
                        </div>
                      </div>
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


