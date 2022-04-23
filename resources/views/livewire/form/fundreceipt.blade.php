

  @if(!empty($dataid))
        
  <div class="iframe-loading">
 

            <iframe id="iframe" onload="$('.iframe-loading').css('background-image', 'none');" src="{{ env('TOYYIBPAY_URL')}}/{{$billcode}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>

   
   </div>
       
@else
                
@endif