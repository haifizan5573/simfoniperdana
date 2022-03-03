<button type="{{$type}}" {!! $onclick !!} class="{{$class}}" @if(isset($targetloader)) id="{{$targetloader}}" @endif >
   
        @if(isset($target))
        <span wire:loading wire:target="{{$target}}">
                <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
        </span>
        @endif
        @if(isset($icon))
          {!! $icon !!}
        @endif
        <span>{{ $label }}</span>
    
</button>

@if(isset($loader))

<div wire:loading @if(isset($targetloader)) wire:target="{{$targetloader}}" @endif>
    <div class="spinner-border text-success m-1" style="width: 1rem; height: 1rem" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

@endif

