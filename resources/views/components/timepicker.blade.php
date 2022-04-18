<label class="form-label">{{$label}}</label>

<div class="input-group" id="timepicker-input-group3">
    <input id="{{$id}}" wire:model="{{$name}}" type="text" class="form-control"
        data-provide="timepicker">

    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
</div>