

  @if(!empty($dataid))
        
  <div class="iframe-loading">
        @if($data->getMime($data->path)=="application/pdf")
            
          <iframe id="iframe" onload="$('.iframe-loading').css('background-image', 'none');" src="{{ env('APP_URL')}}/{!! Storage::url($data->path) !!}" frameborder="0" style="width:100%;min-height:640px;"></iframe>

         @elseif($data->getMime($data->path)=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")

            <iframe id="iframe" onload="$('.iframe-loading').css('background-image', 'none');" src="https://view.officeapps.live.com/op/view.aspx?src={{ env('APP_URL')}}/{!! Storage::url($data->path) !!}" frameborder="0" style="width:100%;min-height:640px;"></iframe>

        @else

              
            <iframe id="iframe" onload="$('.iframe-loading').css('background-image', 'none');" src="{{ route('viewattachment',['id'=>$data->file_uploadsable_id,'formid'=>$data->formid ]) }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                                        
        @endif
   </div>
       
@else
                
@endif