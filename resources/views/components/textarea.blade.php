<label class="form-label">{{ $label }}</label>
<textarea id="{{$element}}" wire:model.lazy="{{$name}}" >{{$content}}</textarea>