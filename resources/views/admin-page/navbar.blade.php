      <!-- ========== header start ========== -->
      <header class="header">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-5 col-md-5 col-6">
                      <div class="header-left d-flex align-items-center">
                          <div class="menu-toggle-btn mr-20">
                              <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                  <i class="lni lni-chevron-left me-2"></i> Menu
                              </button>
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-6">
                      <div class="header-right">
                          <div class="d-flex justify-content-center align-items-center">
                             <!-- filter start -->
                          <div class="filter-box ml-15 me-2 d-none d-md-flex">
                              <a href="{{ url('/') }}" class="px-3 py-2 bg-navbar rounded-2 "><i class="lni lni-home"></i> &nbsp; Kembali ke
                                LandingPage</a>
                          </div>
                          <!-- filter end -->
                            <!-- message start -->
                          <div class="header-message-box ml-15  d-none d-md-flex">
                              <button class="dropdown-toggle" type="button" id="message" data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="lni lni-envelope"></i>
                                  <span class="text-black">{{ @count($notifikasi) }}</span>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">

                                  @foreach($notip as $notif)

                                  <li>
                                      <a href="#0">
                                          <div class="image success-bg">
                                          </div>
                                          <div class="content">
                                              <h6>{{ Str::limit($notif->subject, 30) }}</h6>
                                              <p>{{ Str::limit($notif->pesan, 50) }}</p>
                                              <span>{{ $notif->created_at->diffForHumans() }}</span>
                                          </div>
                                      </a>
                                  </li>

                                  @endforeach

                              </ul>
                          </div>
                          <!-- message end -->
                         
                          </div>
                          <!-- profile start -->
                          <div class="profile-box ml-15">
                              <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <div class="profile-info">
                                      <div class="info">
                                          {{-- <h6>{{ Auth::user()->role->name }}</h6> --}}
                                          <div class="image">
                                              <img src="{{ asset('adminpage/assets/images/profile/profile.png') }}"
                                                  alt="" />
                                              <span class="status"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <i class="lni lni-chevron-down"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li class="">
                                      <a href="#0">
                                          <i class="lni lni-user"></i> {{ Auth::user()->name }}
                                      </a>
                                  </li>
                                  <li class="">
                                      <a href="#0">
                                          <i class="lni lni-tag"></i></i> {{ Auth::user()->role->name }}
                                      </a>
                                  </li>
                                  <li class=""> 
                                      <a href="#0">
                                           <i class="lni lni-envelope"></i> {{ Auth::user()->email }}
                                      </a>
                                  </li>
                                  <li class="">
                                      <a href="/logout"> <i class="lni lni-exit"></i> Sign Out </a>
                                  </li>
                              </ul>
                          </div>
                          <!-- profile end -->
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <!-- ========== header end ========== -->
