<select name="thxettuyen" id="thxettuyen" class="txt-nganh form-control">
@foreach($data as $key => $value)
<option value="{{$key}}">{{$value}}</option>
@endforeach
</select>