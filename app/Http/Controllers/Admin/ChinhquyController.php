<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Doitac;
use App\Admin\Nganhxt;
use App\Admin\Tinh;
use App\Admin\Huyen;
use App\Admin\Truong;
use App\Admin\Hocvienchinhquy;
use App\Admin\Datachamsocvien;
use App\Admin\TemplateHocvienchinhquy;
use Session;
use App\Http\Requests\ChinhquyRequest as ChinhquyRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;

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
        $_flag_type = "chinh-quy";
        $_name_type = "Học viên chính quy";
        $_hocviens = Hocvienchinhquy::all();
        return view('admin.crm.list', ['hocviens' => $_hocviens,'name_type' => $_name_type,  'flag_type' => $_flag_type]);
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

        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" ) {
            //Tinh::truncate();
            $path = $request->file->getRealPath();
            (new FastExcel)->sheet(1)->import($path, function ($line) {
                $ngaydk = $line['Ngày đăng kí'];//OK
                $ten = $line['Họ và tên'];//OK
                $ngaysinh = $line['Ngày sinh'];//OK
                $sdt = $line['Số điện thoại'];//OK
                $cmt = $line['CMTND'];//OK
                $diachi = $line['Địa chỉ'];//OK

                $nganhxt_id = $line['Ngành xét tuyển'];
                $thxettuyen = $line['Tổ hợp xét tuyển'];

                $gioitinh = $line['Giới tính'];//OK
                $dantoc = $line['Dân tộc'];//OK

                $khuvucut = $line['Khu vực ưu tiên'];//Chưa xử lý

                $tinh_id = $line['Tỉnh/Tp'];//Chưa xử lý

                $doituongut = $line['Đối tượng ưu tiên'];//Chưa xử lý

                $huyen_id = $line['Quận/Huyện'];//Chưa xử lý

                $xa = $line['Xã/Phường'];//Ok

                $sdt_2 = $line['Điện thoại gia đình'];//OK
                $email = $line['Email'];//OK

                $doitac_id = $line['Đối tác'];//Chưa xử lý

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

                $truong_id = $line['Trường THPT'];//Chưa xử lý

                $donxt = $line['Đơn xét tuyển'];//OK

                $send_email = $line['Gửi email'];//OK
                $send_sms = $line['Gửi sms'];//OK

                $in_giaynh = $line['In giấy nhập học'];//OK

                $send_giayht = $line['In giấy HT'];//OK
                $hocba = $line['Học bạ'];//OK
                $bangcntt = $line['Bằng CNTT'];//OK
                $ghichu = $line['Ghi chú'];//Ok
                $nguontt_id = $line['Nguồn thông tin'];// Chưa xử lý

                /////////////////////////////////////////
                $ngaygoi = $line['Ngày gọi'];//OK
                $chamsocvien_id = $line['Người gọi'];//Chưa xử lý
                $langoi = $line['Lần gọi'];//OK
                $ngaygoilai = $line['Ngày gọi lại'];//OK
                $noidung = $line['Nội dung'];//OK
                $ttdata = $line['Tình trạng data'];//Chưa xử lý

                $last_hocvien = Hocvienchinhquy::latest('id')->first();
                if($last_hocvien != null){
                    $new_id = $last_hocvien->id + 1;
                    $last_hocvien = $last_hocvien->id + 1;
                }else{
                    $last_hocvien = 1;
                    $new_id = 1;
                }
                $new_mahv = "CQ".str_pad($new_id, 7, '0', STR_PAD_LEFT);
                Hocvienchinhquy::create([
                    'mahv' => $new_mahv,
                    'ten' => $ten,
                    'ngaysinh' => $ngaysinh,
                    'sdt' =>  $sdt,
                    'diachi' =>  $diachi,
                    'cmt' =>  $cmt,
                    'dantoc' =>  $dantoc,
                    'gioitinh' =>  $gioitinh,
                    'xa' =>  $xa,
                    'sdt_2' =>  $sdt_2,
                    'email' =>  $email,
                    'fb' =>  $fb,
                    'ttnhaphoc' =>  $ttnhaphoc,
                    'ptxettuyen' =>  $ptxettuyen,
                    'mapbd' =>  $mapbd,
                    'magnh' =>  $magnh,
                    'ngaygnh' =>  $ngaygnh,
                    'diem_1' =>  $diem_1,
                    'diem_2' =>  $diem_2,
                    'diem_3' =>  $diem_3,
                    'tongdiem' =>  $tongdiem,
                    'donxt' =>  $donxt,
                    'send_email' =>  $send_email,
                    'send_sms' =>  $send_sms,
                    'in_giaynh' =>  $in_giaynh,
                    'send_giayht' =>  $send_giayht,
                    'hocba' =>  $hocba,
                    'bangcntt' =>  $bangcntt,
                    'ghichu' =>  $ghichu,
                    'status' => 1,
                ]);

                Datachamsocvien::create([
                    'ngaygoi' => $ngaygoi,
                    'langoi' => $langoi,
                    'ngaygoilai' => $ngaygoilai,
                    'noidung' =>  $noidung,
                ]);
            });
            
        }else{
            
        }
        return redirect(route('chinh-quy.index'));
    }
}
