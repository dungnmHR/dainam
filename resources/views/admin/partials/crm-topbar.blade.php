<div class="top-bar navbar-top sticky-kit navbar-expand">
  <div class="col-md-12">
    <div class="cms-title">
      @if(Auth::check())
        @if(Auth::user()->can('admin'))
          <button class="add-news f-left btn trai" style="margin-top: -3px;"><a href="{{route('home-backend')}}">
            <span class=" fas fa-home"></span> CMS Home</a>
          </button>
        @endif
      @endif
      Phần mềm quản lý cơ sở dữ liệu - Đại học Đại Nam
    </div>
    <div class="cms-top-bar-center">
      <div class="nav-item dropdown">
        <a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if(Auth::check())
            <span class="topbar-c-t">Xin chào ! {{Auth::user()->name}}</span>
          @endif     
        </a>
        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
          <div class="bg-white rounded-soft py-2">
           
            <a class="dropdown-item" href="pages/profile.html">Profile &amp; account</a>
          
            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>Đăng xuất
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="cms-top-bar-right">
      <span>Thông báo:</span>
      <ul class="navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link unread-indicator" id="navbarDropdownNotification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="count-not">2</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
            <div class="card card-notification shadow-none" style="max-width: 20rem">
              <div class="card-header">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h6 class="card-header-title mb-0">Notifications</h6>
                  </div>
                  <div class="col-auto"><a class="card-link font-weight-normal" href="#">Mark all as read</a></div>
                </div>
              </div>
              <div class="list-group list-group-flush font-weight-normal fs--1">
                <div class="list-group-title">NEW</div>
                <div class="list-group-item">
                  <a class="notification notification-flush bg-200" href="#!">
                    <div class="notification-avatar">
                      <div class="avatar avatar-2xl mr-3">
                        <div class="avatar-name rounded-circle"><span>AB</span></div>
                      </div>
                    </div>
                    <div class="notification-body">
                      <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                      <span class="notification-time"><svg class="svg-inline--fa fa-gratipay fa-w-16 mr-1 text-danger" aria-hidden="true" data-prefix="fab" data-icon="gratipay" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm114.6 226.4l-113 152.7-112.7-152.7c-8.7-11.9-19.1-50.4 13.6-72 28.1-18.1 54.6-4.2 68.5 11.9 15.9 17.9 46.6 16.9 61.7 0 13.9-16.1 40.4-30 68.1-11.9 32.9 21.6 22.6 60 13.8 72z"></path></svg><!-- <span class="mr-1 fab fa-gratipay text-danger"></span> -->9hr</span>

                    </div>
                  </a>

                </div>
                
              </div>
              <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="pages/notifications.html">View all</a></div>
            </div>
          </div>
        </li>
      </ul>
      <form class="form-inline search-box">
        <input class="form-control rounded-pill search-input" type="search" placeholder="Tìm kiếm..." aria-label="Search" /><span class="position-absolute fas fa-search text-400 search-box-icon"></span>
      </form>
    </div>
  </div>
</div>