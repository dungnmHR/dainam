 $("#input_fillter").bsMultiSelect({
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
 $("#cotcanxem").bsMultiSelect({
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
  columnDefs: [ { orderable: false, targets: [0] }],
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

$('#f_nganhxt, #f_date, #boloc').change( function() {
  //alert($(this).find('option:selected').text());
  table.draw();
});
$('#view_full').on('click', function(e) {
  var link = "/crm-dainam/public/crm/set-view-full";
  window.location = link;
});
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
    var name_search = $('#f_name').val();
    var phone_search = $('#f_phone').val();
    var birthday_search = $('#f_birthday').val();
    var cmt_search = $('#f_cmt').val();
    var nganhxt_search = $('#f_nganhxt').find('option:selected').text();
    var nganhxt_val = $('#f_nganhxt').val();
    var date_val = $('#f_date').val();
    var data_fillter = $('#data_fillter').val();
    var fillter_search = $('#boloc').val();
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
    if(true){
      date = new Date();
      switch(date_val) {
        case "1":
          date  = new Date().setDate(date.getDate()-1);
          _str_date = $.format.date(date, "dd/MM/yyyy");
          alert(_str_date);
          break;
        case "2":
          date  = new Date().setDate(date.getDate()-7);
          _str_date = $.format.date(date, "dd/MM/yyyy");
          alert(_str_date);
          break;
        case "3":
          date  = new Date().setDate(date.getDate()-14);
          _str_date = $.format.date(date, "dd/MM/yyyy");
          alert(_str_date);
          break;
        case "5":
          Dates = new Date().getWeek();
          alert(Dates[0].toLocaleDateString() + ' to '+ Dates[1].toLocaleDateString())
          break;
        case "4":
          date  = new Date().setDate(date.getDate()-30);
          _str_date = $.format.date(date, "dd/MM/yyyy");
          alert(_str_date);
          break;
        case "6":
           date  = new Date().setDate(date.getDate()-7);
           Dates = new Date(date).getWeek();     
          _Dates  = Dates[0].getWeek();
          alert(_Dates[0].toLocaleDateString() + ' to '+ _Dates[1].toLocaleDateString())
          break;
        case "7":
          month  = new Date().getMonth() + 1;
          alert(month)
          break;
        case "8":
          month  = new Date().getMonth();
          alert(month)
          break;
        default:   
      }        
    }
    if(data_fillter != null && data_fillter != ""){
      switch(data_fillter) {
        case "magnh":
          column_magnh =  data[33];
          tmp_query = column_magnh.includes(fillter_search);
          break;
        case "nam":
          column_nam =  data[30];
          tmp_query = column_nam.includes(fillter_search);
          break;
        case "tthoso":
          column_dxt =  data[40];
          column_hocba =  data[41];
          column_bangcntt =  data[42];
          break;
        case "ttnhaphoc":
          column_ttnh =  data[30];
          break;
        case "doitac":
          column_doitac =  data[27];
          tmp_query = column_doitac.includes(fillter_search);
          break;
        case "langoi":
          column_langoi =  data[13];
          tmp_query = column_langoi.includes(fillter_search);
          break;
        case "tvv":
          column_tvv =  data[46];
          tmp_query = column_tvv.includes(fillter_search);
          break;
        case "ptxt":
          column_ptxt =  data[31];
          tmp_query = column_ptxt.includes(fillter_search);
          break;
        case "ingnh":
          column_ingnh =  data[12];
          break;
        case "inght":
          column_inght =  data[11];
          break;
        case "send_email":
          column_send_email =  data[9];
          break;
        case "send_sms":
          column_send_sms =  data[10];
          break;
        case "tongdiem":
          column_tongdiem =  data[38];
          break;
        case "tinh":
          column_tinh =  data[22];
          tmp_query = column_tinh.includes(fillter_search); 
          break;
        case "nganhhoc":
          column_nganhhoc =  data[7];
          tmp_query = column_nganhhoc.includes(fillter_search); 
          break;
        case "nguontt":
          column_nguontt =  data[43];
          tmp_query = column_nguontt.includes(fillter_search); 
          break;
        case "ttdata":
          column_ttdata =  data[46];
          tmp_query = column_ttdata.includes(fillter_search); 
          break;
        default:   
      }
      query = query && tmp_query;        
    }
    return query;
});

Date.prototype.getWeek = function(start)
{
    //Calcing the starting point
    start = start || 0;
    var today = new Date(this.setHours(0, 0, 0, 0));
    var day = today.getDay() - start;
    var date = today.getDate() - day;

    // Grabbing Start/End Dates
    var StartDate = new Date(today.setDate(date));
    var EndDate = new Date(today.setDate(date + 6));
    return [StartDate, EndDate];
}

$('#master').on('click', function(e) {
  if($(this).is(':checked',true))  
  {
      $(".sub_chk").prop('checked', true);  
  } else {  
      $(".sub_chk").prop('checked',false);  
  }
  var allVals = [];  
  $(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
  });
  count = allVals.length;
  $('.count-tick').empty().html(count);  
});

$(".sub_chk").on('click', function(e) {
  if(!$(this).is(':checked',true))  
  {
    $('#master').prop('checked', false);  
  }
  var allVals = [];
  $(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
  });
  count = allVals.length;
  $('.count-tick').empty().html(count);  
});

$('.delete-all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
      allVals.push($(this).attr('data-id'));
    }); 
    if(allVals.length <= 0){
      $('#crm-warning').modal('show');
    }else{
      $('#data-del').val(allVals.toString());
      $('#crm-deleteModal').modal('show');
    }
});

$('.attach-user').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
      allVals.push($(this).attr('data-id'));
    });
    data_user = $(this).data('user');
    if(allVals.length <= 0){
      $('#crm-warning').modal('show');
    }else{
      $('#data-attach').val(allVals.toString());
      $('#data-user').val(data_user);
      $('#crm-attachModal').modal('show');
     }
});
