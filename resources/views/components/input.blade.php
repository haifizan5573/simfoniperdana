<label class="form-label">{{ $label }}</label>
<input type="@if(isset($type)){{$type}}@else text @endif" class="form-control @if(isset($maskclass)) {{$maskclass}} @endif" id="{{$id}}"  placeholder="{{$placeholder}}" wire:model="{{$name}}"
@if(isset($mask)) data-inputmask="'mask': '{{$mask}}'" @endif
@if(isset($wire)) {!!$wire!!} @endif
@if(isset($inputlock)&&$inputlock==true) readonly @endif

> 
