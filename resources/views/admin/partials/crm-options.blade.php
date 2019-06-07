<div class="option-header">
  @if(Auth::check())
    @if(Auth::user()->can('admin'))  
      <button class="add-news f-left btn trai"><a href="{{route($flag_type.'.create')}}">
        <span class="fas fa-plus"></span> Tạo mới</a>
      </button>
      <button class="action-del f-left btn trai delete-all"><span class="fas fa-trash-alt"></span> <span>Xóa</span>
      </button>
      <div class="nav-item dropdown">
        <button class="f-left btn trai nav-link pr-0" id="navbarDropdownFile" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="fas fa-exchange-alt"></span> <span>Xuất/Nhập </span> <span class="fas fa-sort-down"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownFile">
          <div class="bg-white rounded-soft py-2">
            <a class="dropdown-item import-a" data-action ="{{route('chinhquy-import')}}" href="javascript:void(0)">
              Nhập file excel
            </a>
            <a class="dropdown-item" href="javascript:void(0)">Xuất file </a>
          </div>
        </div>
      </div>
    @endif
    <div class="xem-full trai">
    <span class="tit-f">Xem đầy đủ</span>
    <label class="switch">
      <input id="view_full" name="view_full" type="checkbox" 
      {{($user->cotcanxem == null || $user->cotcanxem == '') ? 'checked' : ''}}>
      <span class="slider round"></span>
    </label>
  </div>
  @endif


  <div class="nav-item dropdown">
    <button class="f-left btn trai nav-link pr-0" id="navbarDropdownFile" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="fas fa-print"></span> <span>In Files</span> <span class="fas fa-sort-down"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownFile">
      <div class="bg-white rounded-soft py-2">
        <a class="dropdown-item" href="#!">In giấy HT</a>
        <a class="dropdown-item" href="#!">In giấy nhập học</a>
      </div>
    </div>
  </div>
  <div class="nav-item dropdown">
    <button class="f-left btn trai nav-link pr-0" id="navbarDropdownEmail" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="fas fa-mail-bulk"></span> <span>Gửi Email</span><span class="fas fa-sort-down"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownEmail">
      <div class="bg-white rounded-soft py-2">
        <a class="dropdown-item" href="#!">Gửi Email</a>
      </div>
    </div>
  </div>
  @if(Auth::check())
  @if(Auth::user()->can('admin'))  
  <div class="nav-item dropdown">
    <button class="f-left btn trai nav-link pr-0" id="navbarDropdownCol" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span>Gán tư vấn viên</span><span class="fas fa-sort-down"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownCol">
      <div class="bg-white rounded-soft py-2">
        @foreach($chamsocviens as $chamsovien)
        <a class="dropdown-item attach-user" data-user={{$chamsovien->id}} href="javascript:void(0)" >{{$chamsovien->name}}</a>
        @endforeach           
      </div>
    </div>
  </div>
  @endif
  @endif
  <div class="nav-item dropdown">
    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownOption">
      <div class="bg-white rounded-soft py-2">
        <a class="dropdown-item" href="#!">Gửi SMS</a>
      </div>
    </div>
  </div>
  <form id="choncotForm" action="{{route('set-cot-can-xem')}}" method="POST">
    @csrf
    <select id="_choncot" name="cotcanxem[]" multiple="multiple" class="f-left btn trai nav-link pr-0">
      @foreach($full_tables as $_cl)
      @if($_cl->is_default != 1)
      <option value="{{$_cl->code}}">{{$_cl->name}}</option>
      @endif
      @endforeach
    </select>   
  </form>
  <button type="submit" form="choncotForm" class="action-success f-left btn trai">    
      <span class="fas fa-check"></span>
      Áp dụng
  </button>
</div>