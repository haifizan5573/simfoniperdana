<label class="form-label">{{ $label }}</label>
<div class="col-sm-auto"><div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
            
            <input type="text" value="{{$date}}" class="form-control btn btn-outline-primary" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" @if(isset($required))required @endif />
</div></div>