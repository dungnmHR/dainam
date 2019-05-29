 <div id="search-fast">
  <form class="search-inner" method="post" action="">
    <input class="w1" type="text" name="name" placeholder="Họ và tên" value="">
    <input class="w1" type="text" name="phone" placeholder="Số điện thoại" value="">
    <div class="flatpickr">
      <input class="flatpickr flatpickr-input" type="text" placeholder="Ngày sinh" data-input value=""> <!-- input is mandatory -->
      <a class="input-button" title="toggle" data-toggle>
        <span class="far fa-calendar-alt"></span>
      </a>
    </div>
    <select class="chon-nganh">
      <option value="" selected>Chọn ngành</option>
      <option value="ketoan">Kế toán</option>
      <option value="cntt">CNTT & TT</option>
      <option value="supham">Sư phạm</option>
      <option value="congtrinh">Công trình</option>
    </select>
    <button class="sub-fast" type="submit">Tìm nhanh</button>
  </form>
</div>