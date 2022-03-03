<label class="form-label">{{ $label }}</label>
<textarea @if(isset($element))id="{{$element}}"@endif wire:model.lazy="{{$name}}" class="form-control">@if(isset($content)){{$content}}@endif</textarea>