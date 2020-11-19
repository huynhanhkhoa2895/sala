<select class="form-control sala-input" id="select-color">
    <option value="0">Chọn màu</option>
    @foreach ($color as $item)
        <option value="{{$item->id}}">{{$item->content}}</option>
    @endforeach
</select>