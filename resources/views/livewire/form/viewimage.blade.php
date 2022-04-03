@if(!empty($data['img']))
<img src="{{ $data['img']}}" />
@else
  Opps!! Payment receipt not found. Please contact system admin at haiffizan@gmail.com
@endif