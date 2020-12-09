@extends('layouts.app')

@section('title')
DEEANTAR | Tentang Kami
@endsection

@section('content')
<x-navbar></x-navbar>
<x-headline></x-headline>
<main class="ps-main">
      <div class="ps-mission bg-cover">
        <div class="ps-container">
          <h3>Misi Kami</h3>
          <h2>Membuat Digitalisasi dan <br/> Menjadikan Pasar Ciasem Pasar Modern Pertama <br>
          di Indonesia</h2>
        </div>
      </div>
      <div class="ps-section ps-ourteam pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="TEAM">- OUR STAFF</h2>
          </div>
          <div class="ps-section__content">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <div class="ps-user">
                      <div class="ps-user__thumbnnail"><img src="{{ asset('frontend') }}/images/team/team1.jpg" alt="">
                        <ul class="ps-user__social">
                            <li><a href="https://www.linkedin.com/in/fajar-sujaifratama-368569199/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://github.com/fajarsujai" target="_blank" ><i class="fa fa-github"></i></a></li>
                            <li><a href="https://www.facebook.com/fajar.sujai" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/fajarsujai/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                      </div>
                      <div class="ps-user__content">
                        <h3>Fajar Sujai Fratama</h3>
                        <p>CEO &amp; FOUNDER, BACKEND DEVELOPER</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <div class="ps-user">
                      <div class="ps-user__thumbnnail"><img src="{{ asset('frontend') }}/images/team/team2.jpg" alt="">
                        <ul class="ps-user__social">
                        <li><a href="https://www.linkedin.com/in/abdul23lm/" target="_blank" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://github.com/abdul23lm/" target="_blank" ><i class="fa fa-github"></i></a></li>
                        <li><a href="https://dribbble.com/abdul_lm" target="_blank" ><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="https://www.behance.net/abdul_lm" target="_blank" ><i class="fa fa-behance"></i></a></li>
                        <li><a href="https://twitter.com/abdul_lm" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://web.facebook.com/Abdul23LM" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/abdul_lm/" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                        </ul>
                      </div>
                      <div class="ps-user__content">
                        <h3>Abdul Latif Munjiat</h3>
                        <p>FRONTEND DEVELOPER</p>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-all-user pt-25 pb-50">
        <div class="ps-container">
          <div class="row ps-col-tiny">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <div class="ps-join-team">
                    <h3>Apakah kamu tertarik untuk berkontribusi <br>
                    dan bermimpi bersama kami? Join Sekarang</h3><a class="ps-btn" href="#">JOIN OUR TEAM<i class="ps-icon-arrow-left"></i></a>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="ps-home-contact">
        <div id="contact-map" data-address="Pasar Ciasem Subang" data-title="DEEANTAR" data-zoom="17"></div>
        <div class="ps-home-contact__form">
          <header>
            <h3>Hubungi Kami</h3>
            <p>Tanyakan pada kami disini, Kritik dan Saran boleh disampaikan untuk membangun perusahaan menjadi lebih baik</p>
          </header>
          <footer>
            <form action="product-listing.html" method="post">
              <div class="form-group">
                <label>Nama<span>*</span></label>
                <input class="form-control" type="text">
              </div>
              <div class="form-group">
                <label>Email<span>*</span></label>
                <input class="form-control" type="email">
              </div>
              <div class="form-group">
                <label>Pesan untuk Kami<span>*</span></label>
                <textarea class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group text-center">
                <button class="ps-btn">Kirim Pesan</button>
              </div>
            </form>
          </footer>
        </div>
      </div>
    </main>
    <x-footer></x-footer>

@endsection


