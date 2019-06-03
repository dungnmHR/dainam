<nav class="navbar navbar-vertical navbar-expand-lg navbar-light navbar-glass">
  <a class="navbar-brand text-left" href="#">
    <div class="d-flex align-items-center text-primary py-3">
      <div class="d-inline-flex flex-center"><img class="mr-2" src="{{asset('backend/pages/assets/img/illustrations/falcon.png')}}" alt="" width="40" /><span class="text-sans-serif">falcon</span></div>
    </div>
  </a>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <ul class="navbar-nav flex-column">
      <!-- Bảng tin -->
      <li class="nav-item {{$flag == 'bangtin' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('bang-tin')}}">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-store-alt"></span></span><span>Bảng tin</span>
          </div>
        </a>
      </li>
    </ul>
    <hr class="border-300 my-2" />
    <ul class="navbar-nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('chinh-quy.index')}}">
          <div class="d-flex align-items-center"><span class="nav-link-icon">
            <span class="far fa-gem"></span></span><span>Hệ thống CRM</span>
          </div>
        </a>
      </li>
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#setting-crm" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="setting-crm">
        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wrench"></span></span><span>Cấu hình CRM</span>
        </div>
      </a>
      <ul class="nav collapse {{$flag == 'doitac' || $flag == 'tinh' || $flag == 'lienthong'
                || $flag == 'huyen' || $flag == 'truong' || $flag == 'capnhat'
                || $flag == 'tohopxt' || $flag == 'nganhxt' ? 'show' : ''}}" id="setting-crm">
        <li class="nav-item"><a class="nav-link" href="#">Cấu hình bộ lọc</a>
        </li>
        <li class="nav-item"><a class="nav-link {{$flag == 'doitac' ? 'active' : ''}}" href="{{route('doitac.index')}}">Cấu hình đối tác</a>
        </li>
        <hr class="border-300 my-2" />
        <li class="nav-item"><a class="nav-link {{$flag == 'tinh' ? 'active' : ''}}" href="{{route('tinh.index')}}">Cấu hình tỉnh</a></li>
        <li class="nav-item">
          <a class="nav-link {{$flag == 'huyen' ? 'active' : ''}}" href="{{route('huyen.index')}}">Cấu hình quận/huyện</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$flag == 'truong' ? 'active' : ''}}" href="{{route('truong.index')}}">Cấu hình trường THPT</a>
        </li>
        <hr class="border-300 my-2" />
        <li class="nav-item {{$flag == 'tohopxt' ? 'active' : ''}}"><a class="nav-link" href="{{route('tohopxt.index')}}">Cấu hình tổ hợp xét tuyển</a>
        </li>       
        <li class="nav-item {{$flag == 'nganhxt' ? 'active' : ''}}"><a class="nav-link" href="{{route('nganhxt.index')}}">Cấu hình ngành xét tuyển</a>
        </li>      
        <li class="nav-item {{$flag == 'capnhat' ? 'active' : ''}}""><a class="nav-link" href="{{route('capnhat.index')}}">Cấu hình loại hình đăng kí cập nhật</a>
        </li>
         <li class="nav-item {{$flag == 'lienthong' ? 'active' : ''}}"><a class="nav-link" href="{{route('lienthong.index')}}">Cấu hình liên thông</a>
        </li>
        <hr class="border-300 my-2" />
        <li class="nav-item"><a class="nav-link" href="#">Cấu hình email</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('down-hoc-vien-chinh-quy-template')}}">
        Download template file excel</a>
        </li>      
      </ul>
    </li>
    <li class="nav-item {{$flag == 'user' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('user.index')}}">
        <div class="d-flex align-items-center">
          <span class="nav-link-icon"><span class="fas fa-blender-phone"></span></span><span>Tài khoản user</span>
        </div>
      </a>
    </li>
  </ul>
  <hr class="border-300 my-2" />
  <ul class="navbar-nav flex-column">
    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#setting-web" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="setting-web">
      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wrench"></span></span><span>Cấu hình Website</span>
      </div>
    </a>
    <ul class="nav collapse" id="setting-web">
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình menu</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình banner</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình slider</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình thông tin</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình trang của khoa</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình trang tin tức</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">Cấu hình trang tuyển sinh</a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <div class="d-flex align-items-center">
        <span class="nav-link-icon"><span class="fas fa-street-view"></span></span><span>Người dùng</span>
      </div>
    </a>
  </li>      
  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="home">
    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-toolbox"></span></span><span>Công cụ</span>
    </div>
  </a>
  <ul class="nav collapse" id="home">
    <li class="nav-item"><a class="nav-link" href="#">Xuất báo cáo</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="#">Xuất file</a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon"><span class="far fa-building"></span></span><span>Thư viện</span>
    </div>
  </a>
</li>     
</ul><a class="btn btn-primary btn-sm m-3" href="http://dainam.edu.vn/" target="_blank">Website Đại học Đại Nam</a>
</div>
</nav>