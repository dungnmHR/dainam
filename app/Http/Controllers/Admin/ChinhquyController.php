<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Doitac;
use App\Admin\Nganhxt;
use App\Admin\Tohopxt;
use App\Admin\Tinh;
use App\Admin\Huyen;
use App\Admin\Truong;
use App\Admin\Hocvienchinhquy;
use App\Admin\Datachamsocvien;
use App\Admin\TemplateHocvienchinhquy;
use App\Admin\Infotable;
use App\User;
use Session;
use App\Http\Requests\ChinhquyRequest as ChinhquyRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;
use File;
use Yajra\DataTables\DataTables;

class ChinhquyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_full_tables = Infotable::where('status', 1)->where('type',1)->get();
        $_tables = $_full_tables;       
        $_flag_type = "chinh-quy";
        $_name_type = "Học viên chính quy";
        $_hocviens = Hocvienchinhquy::all();
        $_csvs = User::where('status', 1)->where('role', 'chamsocvien')->get();
        $_nganhxts = Nganhxt::where('status',1)->get();
        $user = User::find(\Auth::user()->id);
        $_cotcanxem = $user->cotcanxem;
        if($_cotcanxem == null || $_cotcanxem == ""){
            $_tables = Infotable::where('status', 1)->where('type',1)->get(); 
        }else if($_cotcanxem == "default"){
            $_tables = Infotable::where('status', 1)->where('is_default',1)->where('type',1)->get();
        }else{
            $arr_cotcanxem = explode(";", $_cotcanxem);
            $_tables = Infotable::where('status', 1)->whereIn('code',$arr_cotcanxem)
            ->orWhere('is_default',1)->where('type',1)->get();
        } 
        //dd($_hocviens->first()->data_chamsocvien->user);
        return view('admin.crm.list',   ['hocviens' => $_hocviens,'name_type' => $_name_type,
                                        'full_tables' => $_full_tables, 'user' => $user, 
                                        'info_tables' => $_tables, 'chamsocviens' => $_csvs,
                                        'nganhxts' => $_nganhxts, 'flag_type' => $_flag_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Tạo mã sinh viên
        $last_hocvien = Hocvienchinhquy::latest('id')->first();
        if($last_hocvien != null){
            $new_id = $last_hocvien->id + 1;
            $last_hocvien = $last_hocvien->id + 1;
        }else{
            $last_hocvien = 1;
            $new_id = 1;
        }
        $new_mahv = "CQ".str_pad($new_id, 7, '0', STR_PAD_LEFT);

        //lấy thông tin đối tác
        $_doitacs = Doitac::where('status',1)->get();

        //lấy thông tin ngành đăng kí xét tuyển
        $_nganh_xts = Nganhxt::where('status',1)->get();

        //Lấy thông tin cham soc vien

        return view('admin.crm.chinh-quy', ['doitacs'=>$_doitacs, 'mhv' => $new_mahv,
            'nganhxts'=>$_nganh_xts,
            'new_id' => $new_id, 'last_id' => $last_hocvien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChinhquyRequest $request)
    {
        //
        $tmp_data = $request->all();
        $tinh_code ="";
        if($tmp_data['tinh_id'] != null){
            $_tmp = Tinh::where('name', $tmp_data['tinh_id'])->where('status',1)->first();
            $tmp_data['tinh_id'] = isset($_tmp) ? $_tmp->code : null;

        }
        if($tmp_data['noisinh'] != null){
            $_tmp = Tinh::where('name', $tmp_data['noisinh'])->where('status',1)->first();
            $tmp_data['noisinh'] = isset($_tmp) ? $_tmp->code : null;
            
        }
        if($tmp_data['huyen_id'] != null){
            $_tmp = Huyen::where('name', $tmp_data['huyen_id'])->where('status',1)->first();
            $tmp_data['huyen_id'] = isset($_tmp) ? $_tmp->code : null;
        }
        if($tmp_data['truong_id'] != null){
            $_tmp = Truong::where('name', $tmp_data['truong_id'])->where('tinh_id',$tmp_data['tinh_id'])
            ->where('status',1)->first();
            $tmp_data['truong_id'] = isset($_tmp) ? $_tmp->id : null;
        }
        if($tmp_data['nganhxt_code'] != null){
            $_tmp = Nganhxt::where('code', $tmp_data['nganhxt_code'])->where('status',1)->first();
            $tmp_data['nganhxt_id'] = isset($_tmp) ? $_tmp->id : null;
        }
        $tmp_data['bangcntt'] = (isset($tmp_data['bangcntt']) && $tmp_data['bangcntt'] != null) ? 1:0;
        $tmp_data['hocba'] = (isset($tmp_data['hocba']) && $tmp_data['hocba'] != null) ? 1:0;
        $tmp_data['donxt'] = (isset($tmp_data['donxt']) && $tmp_data['donxt'] != null) ? 1:0;
        $tmp_data['ttnhaphoc'] = (isset($tmp_data['ttnhaphoc']) && $tmp_data['ttnhaphoc'] != null) ? 1:0;
        $tmp_data['send_email'] = (isset($tmp_data['send_email']) && $tmp_data['send_email'] != null) ? 1:0;
        $tmp_data['send_sms'] = (isset($tmp_data['send_sms']) && $tmp_data['send_sms'] != null) ? 1:0;
        $tmp_data['send_giayht'] = (isset($tmp_data['send_giayht']) && $tmp_data['send_giayht'] != null) ? 1:0;
        $hocvienchinhquy = Hocvienchinhquy::create($tmp_data);
        $hocvien_id = $hocvienchinhquy->id;
        $tmp_data_2['ngaygoi'] = $tmp_data['ngaygoi'];
        $tmp_data_2['hocvien_id'] =  $hocvien_id;
        $tmp_data_2['chamsocvien_id'] = $tmp_data['chamsocvien_id'];
        $tmp_data_2['langoi'] = $tmp_data['langoi'];
        $tmp_data_2['ngaygoilai'] = $tmp_data['ngaygoilai'];
        $tmp_data_2['noidung'] = $tmp_data['noidung'];
        $tmp_data_2['ttdata'] = $tmp_data['ttdata'];
        $tmp_data_2['status'] = $tmp_data['status'];
        Datachamsocvien::create($tmp_data_2);
        Session::flash('success-create-chinh-quy', 'Thêm học viên chính quy : "'.$request->ten.'" thành công.');
        return redirect(route('chinh-quy.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTohopxt(Request $request)
    {
        //
        $nganhxt_code = $request->input('query');
        $nganhxt = Nganhxt::where('status', 1)->where('code', $nganhxt_code)->first();
        if( $nganhxt != null){
            $data = $nganhxt->list_tohop;
            return  view('admin.partials.tohopxt')->with('data',$data);
        }
        return "";
    }

    public function downloadTemplate(Request $request)
    {       
        return Excel::download(new TemplateHocvienchinhquy(), 'Hoc_vien_chinh_quy.xlsx');        
    }

    public function import(Request $request)
    {       

        $arr_district = ['quận', 'huyện', 'thị xã'];
        $arr_city = ['thành phố', 'tỉnh'];
        $arr_nguonthongtin = ['truyền hình', 'báo chí', 'ngày hội tuyển sinh',
        'sự kiện tư vấn tuyển sinh tại trường thpt bạn theo học', 'youtube', 'facebook',
        'website', 'tờ rơi','người thân, bạn bè, thầy cô'];
        $arr_ttdata = ['A'=>'a-tiềm năng', 'B'=>'b-đang phân vân', 'C'=>'c-từ chối', 'T'=>'t-chưa nghe máy'];
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" ) {
            //Tinh::truncate();
            
            $path = $request->file->getRealPath();
            (new FastExcel)->sheet(1)->import($path, function ($line) 
                use ($arr_district, $arr_city, $arr_nguonthongtin,$arr_ttdata)
                {
                $ngaydk = $line['Ngày đăng kí'];//OK
                $ten = $line['Họ và tên'];//OK
                $ngaysinh = $line['Ngày sinh'];//OK
                $sdt = $line['Số điện thoại'];//OK
                $cmt = $line['CMTND'];//OK
                $diachi = $line['Địa chỉ'];//OK
                $nam = $line['Năm tuyển sinh'];
                $nganhxt_id = null;
                $_tmp = mb_strtolower($line['Ngành xét tuyển'], 'UTF-8');//OK

                $_tmp = ($_tmp != "") ? Nganhxt::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $nganhxt_id = $_tmp->id;
                $thxettuyen = null;
                $_tmp = mb_strtolower($line['Tổ hợp xét tuyển'], 'UTF-8');//OK
                $_tmp = ($_tmp != "") ? Tohopxt::whereRaw('lower(code) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $thxettuyen = $_tmp->id;

                $gioitinh = $line['Giới tính'];//OK
                $dantoc = $line['Dân tộc'];//OK
                $khuvucut = $line['Khu vực ưu tiên'];//OK

                $tinh_id = null;
                $_tmp = mb_strtolower($line['Tỉnh/Tp'], 'UTF-8');//OK
                for($i = 0; $i < sizeof($arr_city); $i++){
                    $_tmp = str_replace($arr_city[$i], '', $_tmp);
                }
                $_tmp = explode(" ", $_tmp);
                $index = array_search('',$_tmp);
                if($index !== FALSE){
                    unset($_tmp[$index]);
                };
                $_tmp = implode(' ', $_tmp);
                $_tmp = ($_tmp != "") ? Tinh::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $tinh_id = $_tmp->code;

                $noisinh = null;
                $_tmp = mb_strtolower($line['Nơi sinh'], 'UTF-8');//OK
                for($i = 0; $i < sizeof($arr_city); $i++){
                    $_tmp = str_replace($arr_city[$i], '', $_tmp);
                }
                $_tmp = explode(" ", $_tmp);
                $index = array_search('',$_tmp);
                if($index !== FALSE){
                    unset($_tmp[$index]);
                };
                $_tmp = implode(' ', $_tmp);
                $_tmp = ($_tmp != "") ? Tinh::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $noisinh = $_tmp->code;

                $doituongut = $line['Đối tượng ưu tiên'];//OK

                $huyen_id = null;
                $_tmp = mb_strtolower($line['Quận/Huyện'], 'UTF-8');//OK
                for($i = 0; $i < sizeof($arr_district); $i++){
                    $_tmp = str_replace($arr_district[$i], '', $_tmp);
                }
                $_tmp = explode(" ", $_tmp);
                $index = array_search('',$_tmp);
                if($index !== FALSE){
                    unset($_tmp[$index]);
                };
                $_tmp = implode(' ', $_tmp);
                $_tmp = ($_tmp != "") ? Huyen::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $huyen_id = $_tmp->id;

                $xa = $line['Xã/Phường'];//Ok

                $sdt_2 = $line['Điện thoại gia đình'];//OK
                $email = $line['Email'];//OK

                $doitac_id = null;//
                $_tmp = mb_strtolower($line['Đối tác'], 'UTF-8');//OK
                $_tmp = ($_tmp != "") ? Doitac::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $doitac_id = $_tmp->id;

                $fb = $line['Facebook'];//OK
                $ttnhaphoc = $line['Tình trạng nhập học'];//OK
                $ptxettuyen = $line['Phương thức xét tuyển'];//OK
                $mapbd = $line['Mã phiếu báo điểm'];//OK
                $magnh = $line['Mã giấy nhập học'];//OK
                $ngaygnh = $line['Ngày in giấy nhập học'];//OK
                $diem_1 = $line['Điểm môn 1'];//OK
                $diem_2 = $line['Điểm môn 2'];//OK
                $diem_3 = $line['Điểm môn 3'];//Ok
                $tongdiem = $line['Tổng điểm'];//OK

                $truong_id = null;//
                $_tmp = mb_strtolower($line['Trường THPT'], 'UTF-8');//OK

                $_tmp = ($_tmp != "") ? Truong::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $truong_id = $_tmp->id;

                $donxt = $line['Đơn xét tuyển'];//OK

                $send_email = $line['Gửi email'];//OK
                $send_sms = $line['Gửi sms'];//OK

                $in_giaynh = $line['In giấy nhập học'];//OK

                $send_giayht = $line['In giấy HT'];//OK
                $hocba = $line['Học bạ'];//OK
                $bangcntt = $line['Bằng CNTT'];//OK
                $ghichu = $line['Ghi chú'];//Ok
                $nguontt_id = null;// OK
                $_tmp = mb_strtolower($line['Nguồn thông tin'], 'UTF-8');
                if($_tmp != null && $_tmp != ""){
                    for($i = 0; $i < sizeof($arr_nguonthongtin); $i++){
                        if($arr_nguonthongtin[$i] == $_tmp) $nguontt_id = $i;
                    }  
                }
                /////////////////////////////////////////
                $ngaygoi = $line['Ngày gọi'];//OK
                $chamsocvien_id = 0;
                $_tmp = mb_strtolower($line['Người gọi'], 'UTF-8');//OK
                $_tmp = ($_tmp != "") ? User::whereRaw('lower(name) like (?)',["%{$_tmp}%"])->first() : null;
                if($_tmp != null) $chamsocvien_id = $_tmp->id;
                $langoi = $line['Lần gọi'];//OK
                $ngaygoilai = $line['Ngày gọi lại'];//OK
                $noidung = $line['Nội dung'];//OK
                $ttdata = null;
                $_tmp = mb_strtolower($line['Tình trạng data'], 'UTF-8');
                if($_tmp != null && $_tmp != ""){
                    foreach ($arr_ttdata as $key => $value) {
                        if($value == $_tmp) $ttdata = $key;
                    }  
                }
                $last_hocvien = Hocvienchinhquy::latest('id')->first();
                if($last_hocvien != null){
                    $new_id = $last_hocvien->id + 1;
                    $last_hocvien = $last_hocvien->id + 1;
                }else{
                    $last_hocvien = 1;
                    $new_id = 1;
                }
                $new_mahv = "CQ".str_pad($new_id, 7, '0', STR_PAD_LEFT);
                $hocvien = Hocvienchinhquy::create([
                    'ngaydk' => $ngaydk,
                    'mahv' => $new_mahv,
                    'ten' => $ten,
                    'ngaysinh' => $ngaysinh,
                    'nam' => $nam,
                    'sdt' =>  $sdt,
                    'diachi' =>  $diachi,
                    'cmt' =>  $cmt,
                    'dantoc' =>  $dantoc,
                    'gioitinh' =>  $gioitinh,
                    'khuvucut' =>  $khuvucut,
                    'xa' =>  $xa,
                    'sdt_2' =>  $sdt_2,
                    'email' =>  $email,
                    'fb' =>  $fb,
                    'ttnhaphoc' =>  $ttnhaphoc !== "" ?  $ttnhaphoc : 0,
                    'ptxettuyen' =>  $ptxettuyen !== "" ?  $ptxettuyen : 0,
                    'mapbd' =>  $mapbd,
                    'magnh' =>  $magnh,
                    'ngaygnh' =>  $ngaygnh,
                    'diem_1' =>  $diem_1 !== "" ?  $diem_1 : 0,
                    'diem_2' =>  $diem_2 !== "" ?  $diem_2 : 0,
                    'diem_3' =>  $diem_3 !== "" ?  $diem_3 : 0,
                    'tongdiem' =>  $tongdiem !== "" ?  $tongdiem : 0,
                    'donxt' =>  $donxt !== "" ?  $donxt : 0,
                    'send_email' =>  $send_email !== "" ?  $send_email : 0,
                    'send_sms' =>  $send_sms !== "" ?  $send_sms : 0,
                    'ngaygnh' => $ngaygnh,
                    'in_giaynh' => $in_giaynh !== "" ?  $in_giaynh : 0,
                    'send_giayht' =>  $send_giayht !== "" ?  $send_giayht : 0,
                    'hocba' =>   $hocba !== "" ?  $hocba : 0,
                    'bangcntt' =>   $bangcntt !== "" ?  $bangcntt : 0,
                    'ghichu' =>  $ghichu,
                    'tinh_id' => $tinh_id,
                    'huyen_id' => $huyen_id,
                    'doituongut' => $doituongut,
                    'doitac_id' => $doitac_id,
                    'truong_id' => $truong_id,
                    'nguontt_id' => $nguontt_id,
                    'nganhxt_id' => $nganhxt_id,
                    'thxettuyen' => $thxettuyen,
                    'noisinh' => $noisinh,
                    'status' => 1,
                ]);

                $datachamsocvien = Datachamsocvien::create([
                    'ngaygoi' => $ngaygoi,
                    'langoi' => $langoi !== "" ?  $langoi : 0,
                    'hocvien_id' => $hocvien->id,
                    'ngaygoilai' => $ngaygoilai,
                    'noidung' =>  $noidung,
                    'chamsocvien_id' =>  $chamsocvien_id,
                    'ttdata' => $ttdata,
                    'type' => 1,
                    'status' => 1,
                ]);
            });

        }else{

        }
        return redirect(route('chinh-quy.index'));
    }

    public function setCotcanxem(Request $request)
    {
       $list_cotcanxem = $request->cotcanxem;
       if(\Auth::check()){
            $user = \Auth::user();
            if($list_cotcanxem == null || sizeof($list_cotcanxem) == 0) $_tmp = "default";
            else $_tmp = implode(';',$list_cotcanxem);
            $user->cotcanxem = $_tmp;
            $user->update();
            return redirect()->route('chinh-quy.index');
       }
    }

    public function setViewFull(Request $request)
    {
       if(\Auth::check()){
        $user = User::find(\Auth::user()->id);
        $_tmp = $user->cotcanxem;
        if($_tmp == null || $_tmp == "") $_tmp = "default";
        else $_tmp = null;
        $user->cotcanxem = $_tmp;
        $user->update();
        return redirect()->route('chinh-quy.index');
        }
    }

    public function delData(Request $request){
        $data_del = $request->data_del;
        $arr_id_del = explode(',', $data_del);
        for($i = 0; $i < sizeof($arr_id_del); $i ++){
            $hv = Hocvienchinhquy::find($arr_id_del[$i]);
            if(isset($hv) && $hv != null){
                $hv->delete();
            }
        }
        Session::flash('hv-chinhquy-success', 'Đã xóa thành công học viên chính quy đã chọn.');
        return redirect()->route('chinh-quy.index');
    }

    public function attachData(Request $request){
        $data_attach = $request->data_attach;
        $data_user = $request->data_user;
        $arr_id_attach = explode(',', $data_attach);
        for($i = 0; $i < sizeof($arr_id_attach); $i ++){
            $hv = Hocvienchinhquy::find($arr_id_attach[$i]);
            if(isset($hv) && $hv != null){
                $hv->user_id = $data_user;
                $hv->update();
            }
        }
        Session::flash('hv-chinhquy-success', 'Đã gán thành công học viên chính quy đã chọn.');
        return redirect()->route('chinh-quy.index');
    }

    public function getByUser(Request $request, $id)
    {
        if($id == 0){
            return redirect()->route('chinh-quy.index');
        }
        $_full_tables = Infotable::where('status', 1)->where('type',1)->get();
        $_tables = $_full_tables;       
        $_flag_type = "chinh-quy";
        $_name_type = "Học viên chính quy";
        $_hocviens = Hocvienchinhquy::where('status',1)->where('user_id', $id)->get();
        $_tuvanvien = User::find($id);
        $_csvs = User::where('status', 1)->where('role', 'chamsocvien')->get();
        $_nganhxts = Nganhxt::where('status',1)->get();
        $user = User::find(\Auth::user()->id);
        $_cotcanxem = $user->cotcanxem;
        if($_cotcanxem == null || $_cotcanxem == ""){
            $_tables = Infotable::where('status', 1)->where('type',1)->get(); 
        }else if($_cotcanxem == "default"){
            $_tables = Infotable::where('status', 1)->where('is_default',1)->where('type',1)->get();
        }else{
            $arr_cotcanxem = explode(";", $_cotcanxem);
            $_tables = Infotable::where('status', 1)->whereIn('code',$arr_cotcanxem)
            ->orWhere('is_default',1)->where('type',1)->get();
        } 
        //dd($_hocviens->first()->data_chamsocvien->user);
        return view('admin.crm.list',   ['hocviens' => $_hocviens,'name_type' => $_name_type,
                                        'full_tables' => $_full_tables, 'user' => $user, 
                                        'info_tables' => $_tables, 'chamsocviens' => $_csvs,
                                        'tuvanvien' =>  $_tuvanvien,
                                        'nganhxts' => $_nganhxts, 'flag_type' => $_flag_type]);
    }
    public function getFillter(Request $request)
    {
        $data_fillter = $request->input('query');
        switch ($data_fillter) {
            case 'magnh':
                $data = Hocvienchinhquy::pluck('mahv as name')->all();
                break;
            case 'nam':
                $data =[];
                break;
            case 'tthoso':
                $data = ['Chưa có hồ sơ', 'Thiếu hồ sơ', 'Đủ hồ sơ'];
                break;
            case 'doitac':
                $data = Doitac::where('status', 1)->get()->pluck('name')->all();
                break;
            case 'langoi':
                $data = ['1', '2', '3', '4', '5'];
                break;
            case 'tvv':
                $data = User::where('status', 1)->get()->pluck('name')->all();
                break;
            case 'ptxt':
                $data = ['Xét học bạ', 'Điểm thi THPT QG', 'Cả 2 phương thức'];
                break;
            case 'ingnh':
                $data = ['Chưa in giấy báo nhập học', 'Đã in giấy báo nhập học'];
                break;
            case 'inght':
                $data = ['Chưa in giấy hoàn thiện', 'Đã in giấy hoàn thiện'];
                break;
            case 'send_email':
                $data = ['Chưa gửi', 'Đã gửi'];
                break;
            case 'send_sms':
                $data = ['Chưa gửi', 'Đã gửi'];
                break;
            case 'tongdiem':
                $data = ['0-5', '5-10', '5-8', '8-10'];
                break;
            case 'tinh':
                $data = Tinh::pluck('name')->where('status', 1)->all();
                break;
            case 'nganhhoc':
                $data = Nganhxt::pluck('name')->where('status', 1)->all();
                break;
            case 'nguontt':
                $data = ['Truyền hình', 'Báo chí', 'Ngày hội Tuyển sinh', 'Người thân, bạn bè, thầy cô', 'Sự kiện tư vấn tuyển sinh tại trường THPT bạn theo học', 'Youtube', 'Facebook', 'Website', 'Tờ rơi'];
                break;
            case 'ttdata':
                $data = ['A – Tiềm năng', 'B – Đang phân vân', 'C – Từ chối', 'T – Chưa nghe máy'];
                break;
            
            default:
                $data = [];
                break;
        }     
        return response()->json($data);
    }

}
