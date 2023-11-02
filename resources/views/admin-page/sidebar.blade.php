    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper bg-dark">
      <div class="navbar-logo">
        <a href="{{ url('/admin') }}">
          <img src="{{ asset('landingpage//images/Logo.png') }}" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item animate">
            <a class="text-white" href="{{ url('/admin') }}">
              <span class="icon">
               <i class="lni lni-grid-alt"></i>
              </span>
              <span class="text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-item-has-children animate">
            <a
              href="#"
              class="collapsed text-white"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon text-white">
                <i class="lni lni-folder"></i>
              </span>
              <span class="text text-white">Berita</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li class="">
                <a href="{{ url('/admin-page/kategori') }}" class="text-white"> Kategori Berita </a>
              </li>
              <li class="">
                <a href="{{ url('/admin-page/berita') }}" class="text-white"> Berita </a>
              </li>
              <li class="">
                <a href="{{ url('/admin-page/document') }}" class="text-white"> Document / File </a>
              </li>
              <li class="">
                <a href="{{ url('/admin-page/tautan') }}" class="text-white"> Link / Tautan </a>
              </li>
            </ul>
          </li>



          @if (Auth::user()->role_id != 1 && Auth::user()->role_id !=2)

          @else
          <li class="nav-item animate">
            <a href="{{ url('/admin-page/struktur') }}" class="text-white">
              <span class="icon">
                <i class="lni lni-users"></i>
              </span>
              <span class="text">Struktur Sekolah</span>
            </a>
          </li>
          <li class="nav-item animate">
            <a href="{{ url('/admin-page/siswa') }}" class="text-white">
              <span class="icon">
               <i class="lni lni-user"></i>
              </span>
              <span class="text">Data Siswa</span>
            </a>
          </li>
          @endif


          <li class="nav-item animate" >
            <a href="{{ url('/admin-page/galeri') }}" class="text-white">
              <span class="icon">
                <i class="lni lni-image"></i>
              </span>
              <span class="text">Galeri</span>
            </a>
          </li>

          @if (Auth::user()->role_id == 1)

          <li class="nav-item nav-item-has-children animate">
            <a
              href="#0"
              class="collapsed text-white"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_3"
              aria-controls="ddmenu_3"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon text-white">
                <i class="lni lni-link"></i>
              </span>
              <span class="text text-white">Auth</span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
              <li class="">
                <a class="text-white" href="/admin-page/manage-user"> Manage User </a>
              </li>
              {{-- <li>
                <a href="/admin-page/setting"> Setting </a>
              </li> --}}
            </ul>
          </li>

          @else

          @endif




          <span class="divider"><hr /></span>

          <li class="nav-item animate">
            <a href="/admin-page/notifikasi" class="text-white">
              <span class="icon">
                <i class="lni lni-envelope"></i>
              </span>
              <span class="text">Pesan</span>
            </a>
          </li>
          <li class="nav-item d-lg-none">
            <a href="{{ url('/') }}" class="text-white">
              <span class="icon">
                <i class="lni lni-home"></i>
              </span>
              <span class="text">Landing Page</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->