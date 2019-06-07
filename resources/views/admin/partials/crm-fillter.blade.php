<div id="search-fast">
  <form class="search-inner" method="post" action="">
    <input class="w1" type="text" name="name" id="f_name" placeholder="Họ và tên" value="">
    <input class="w1" type="text" name="phone" id="f_phone"  placeholder="Số điện thoại" value="">
    <input class="w1" type="text" name="birthday" id="f_birthday"  placeholder="Ngày sinh" value="">
    <input class="w1" type="text" name="cmnd" id="f_cmt" placeholder="Chứng minh thư" value="">
    <select class="chon-nganh" id="f_nganhxt">
      <option value="all" selected>Tất cả các ngành</option>
      @foreach($nganhxts as $nganhxt)
        <option value="{{$nganhxt->code}}">{{$nganhxt->name}}</option>
      @endforeach
    </select>
  </form>
</div>