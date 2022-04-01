<label class="form-label">{{ $label }}</label><br/>
<select wire:model.debounce.2000s="{{$name}}" class="form-control" id="@if(isset($selectid)){{$selectid}}@endif">

       
    @if(isset($datas))
        @foreach($datas as $data)
             @if(isset($filtertype))
                @if($filtertype=='roles')
                    @if($data->roles->first()->name==$filter)
                    <option value="{{ $data->$id }}">{{$data->$fieldname}}</option>
                    @endif
                @endif
             @else
                    <option value="{{ $data[$id] }}">{{$data[$fieldname]}}</option>
             @endif
        @endforeach
    @endif                                                             
</select>