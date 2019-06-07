
<thead>
    <tr>
        <th width="50px"><input type="checkbox" id="master"></th>
        <!-- các cột mặc định -->
        @foreach($info_tables as $_cl)       
        <th>{{$_cl->name}}</th>       
        @endforeach
    </tr>
</thead>
<tbody>
    @foreach($hocviens as $hocvien)
    <tr>
        <td><input type="checkbox" class="sub_chk" data-id="{{$hocvien->id}}"></td>
        <!-- các cột mặc định -->
        @foreach($info_tables as $_cl)            
            @switch($_cl->code)
                @case("nganhxt_id")
                    <td>{{$hocvien->nganhxt->name}}</td>
                    @break
                @case("thxettuyen")
                    <td>{{$hocvien->tohopxt()->first()->code}}({{$hocvien->tohopxt()->first()->content}})</td>
                    @break
                @case("gioitinh")
                    @if($hocvien->toArray()[$_cl->code] == 1)
                        <td>Nam</td>
                        @else
                        <td>Nữ</td>
                    @endif        
                    @break
                @case("send_email")
                    <td><input type="checkbox" name="send_email[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("send_sms")
                    <td><input type="checkbox" name="send_sms[]" disabled 
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("send_giayht")
                    <td><input type="checkbox" name="send_giayht[]" disabled 
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("in_giaynh")
                    <td><input type="checkbox" name="in_giaynh[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("ttnhaphoc")
                    <td><input type="checkbox" name="ttnhaphoc[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("donxt")
                    <td><input type="checkbox" name="donxt[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("hocba")
                    <td><input type="checkbox" name="hocba[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("bangcntt")
                    <td><input type="checkbox" name="bangcntt[]" disabled
                        {{$hocvien->toArray()[$_cl->code] == 1 ? 'checked' : '' }} >
                    </td>
                    @break
                @case("noisinh")
                    <td>{{$hocvien->name_noisinh}}</td>
                    @break

                @case("tinh_id")
                    <td>{{$hocvien->tinh()->first()->name}}</td>
                    @break

                @case("huyen_id")
                    <td>{{$hocvien->huyen()->first()->name}}</td>
                    @break

                @case("truong_id")
                    <td>{{$hocvien->truong()->first()->name}}</td>
                    @break

                @case("doitac_id")
                    <td>{{$hocvien->doitac()->first()->name}}</td>
                    @break

                @case("ptxettuyen")
                    @switch($hocvien->toArray()[$_cl->code])
                        @case(1)
                            <td>Xét học bạ</td>
                            @break
                        @case(2)
                            <td>Điểm thi THPT QG</td>
                            @break
                        @case(3)
                            <td>Cả 2 phương thức</td>
                            @break
                        @default
                            <td></td>                         
                    @endswitch    
                    @break

                @case("nguontt_id")
                    @switch($hocvien->toArray()[$_cl->code])
                        @case(0)
                            <td>Truyền hình</td>
                            @break
                        @case(1)
                            <td>Báo chí</td>
                            @break
                        @case(2)
                            <td>Ngày hội Tuyển sinh</td>
                            @break
                        @case(3)
                            <td>Sự kiện tư vấn tuyển sinh tại trường THPT bạn theo học</td>
                            @break
                        @case(4)
                            <td>Youtube</td>
                            @break
                        @case(5)
                            <td>Facebook</td>
                            @break
                        @case(6)
                            <td>Website</td>
                            @break
                        @case(7)
                            <td>Tờ rơi</td>
                            @break
                        @default
                            <td></td>                         
                    @endswitch    
                    @break
                @case("langoi")
                    @if($hocvien->data_chamsocvien != null)
                        <td>{{$hocvien->data_chamsocvien->langoi}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break
                @case("ngaygoi")
                    @if($hocvien->data_chamsocvien != null)
                        <td>{{$hocvien->data_chamsocvien->ngaygoi}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break
                @case("ngaygoilai")
                    @if($hocvien->data_chamsocvien != null)
                        <td>{{$hocvien->data_chamsocvien->ngaygoilai}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break
                @case("noidung")
                    @if($hocvien->data_chamsocvien != null)
                        <td>{{$hocvien->data_chamsocvien->noidung}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break
                @case("chamsocvien_id")
                    @if($hocvien->data_chamsocvien != null && count($hocvien->data_chamsocvien->user()->get()) > 0)
                        <td>{{$hocvien->data_chamsocvien->user()->first()->name}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break
                @case("ttdata")
                    @if($hocvien->data_chamsocvien != null)
                        <td>{{$hocvien->data_chamsocvien->ttdata}}</td>
                    @else
                    <td></td> 
                    @endif
                    @break

                @default
                <td>{{$hocvien->toArray()[$_cl->code]}}</td>
                @php
                @endphp
            @endswitch
        @endforeach
    </tr>
    @endforeach
</tbody>   
<tr class="total-action">
    <td></td>
    <!-- các cột mặc định -->
    @foreach($info_tables as $_cl)
        <td>{{$_cl->option_sum != null ? '20' : ''}}</td>
    @endforeach
</tr>
