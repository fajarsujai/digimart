

    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>Aplikasi Pasar Ciasem Subang - Hotline: 0821-3031-4423</p>
                </div>
                <!-- <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions"><a href="#">Login & Regiser</a>
                  </div> -->
                </div>
          </div>
        </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="{{ route('home') }}"><img src="{{ asset('frontend') }}/images/logo.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item"><a href="{{ route('home') }}">Beranda</a>
                  </li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Kategori</a>
                    <div class="mega-menu">
                      <div class="mega-wrap">
                        <div class="mega-column">
                          <ul class="mega-item mega-features">
                            <li><a href="#">Sayuran</a></li>
                            <li><a href="#">Daging</a></li>
                            <li><a href="#">Bumbu</a></li>
                            <li><a href="#">Buah-Buahan</a></li>
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">Sayuran</h4>
                          <ul class="mega-item">
                            <li><a href="#">Toko A</a></li>
                            <li><a href="#">Toko B</a></li>
                            <li><a href="#">Toko C</a></li>
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">Daging</h4>
                          <ul class="mega-item">
                            <li><a href="#">Toko A</a></li>
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">Bumbu</h4>
                          <ul class="mega-item">
                            <li><a href="#">Toko A</a></li>
                            <li><a href="#">Toko B</a></li>
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">Buah-Buahan</h4>
                          <ul class="mega-item">
                            <li><a href="#">Toko A</a></li>
                            <li><a href="#">Toko B</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item"><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="do_action" method="post">
              <input class="form-control" type="text" placeholder="Cari Toko atau Produk…">
              <button><i class="ps-icon-search"></i></button>
            </form>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
