 $("select[multiple='multiple']").bsMultiSelect({
              selectedPanelDefMinHeight: 'calc(2.25rem + 2px)',  // default size
              selectedPanelLgMinHeight: 'calc(2.875rem + 2px)',  // LG size
              selectedPanelSmMinHeight: 'calc(1.8125rem + 2px)', // SM size
              selectedPanelDisabledBackgroundColor: '#e9ecef',   // disabled background
              selectedPanelFocusBorderColor: '#80bdff',          // focus border
              selectedPanelFocusBoxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)',  // foxus shadow
              selectedPanelFocusValidBoxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)',  // valid foxus shadow
              selectedPanelFocusInvalidBoxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)',  // invalid foxus shadow
              inputColor: '#495057', // color of keyboard entered text
              selectedItemContentDisabledOpacity: '.65' // btn disabled opacity used
            });
 $(".flatpickr").flatpickr({
  maxDate: "today",
  dateFormat: "d/m/Y",
});

$('#info-table').DataTable( {
  responsive: {
    details: false
  },
  select: true,
  autoFill: true,
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
  "language": {
    "lengthMenu": 'Hiển thị <select class="form-control">'+
    '<option value="10">10</option>'+
    '<option value="20">20</option>'+
    '<option value="30">30</option>'+
    '<option value="40">40</option>'+
    '<option value="100">100</option>'+
    '<option value="-1">All</option>'+
    '</select> bản ghi'
  }
});

var table = $('#info-table').DataTable();
 $('#f_name, #f_phone, #f_birthday, #f_cmt').keyup( function() {
  table.draw();
});

$('#f_nganhxt').change( function() {
  //alert($(this).find('option:selected').text());
  table.draw();
});
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
    var name_search = $('#f_name').val();
    var phone_search = $('#f_phone').val();
    var birthday_search = $('#f_birthday').val();
    var cmt_search = $('#f_cmt').val();
    var nganhxt_search = $('#f_nganhxt').find('option:selected').text();
    var nganhxt_val = $('#f_nganhxt').val();
    var column_name =  data[3];
    var column_phone =  data[6];
    var column_birthday =  data[4];
    var column_cmt =  data[7];
    var column_nganhxt =  data[8];
    var query = true;
    if(name_search != ""){
      query = column_name.includes(name_search);
    }
    if(phone_search != ""){
      query = query && column_phone.includes(phone_search);
    }
    if(birthday_search != ""){
      query = query && column_birthday.includes(birthday_search);
    }
    if(cmt_search != ""){
      query = query && column_cmt.includes(cmt_search);
    }
    if(nganhxt_val != "all"){
      query = query && column_nganhxt.includes(nganhxt_search);
    }
    return query;
});