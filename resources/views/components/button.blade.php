<button type="{{$type}}" {!! $onclick !!} class="{{$class}}">
    @if(isset($target))
    <span wire:loading wire:target="{{$target}}">
            <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
    </span>
    @endif
    <span>{{ $label }}</span>
</button>