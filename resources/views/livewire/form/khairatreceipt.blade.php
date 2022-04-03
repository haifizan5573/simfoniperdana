

  @if(!empty($dataid))
        
        {{$data->getMime($data->path)}}
        {{$data->path}}
        @if($data->getMime($data->path)=="application/pdf")
            
          <iframe src="{{ env('APP_URL')}}/{{ $data->file_uploadsable_id }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>

         @elseif($data->getMime($data->path)=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")

            <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ env('APP_URL')}}/{{ $data->file_uploadsable_id }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>

        @else

              
            <iframe src="{{ route('viewattachment',['id'=>$data->file_uploadsable_id]) }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                                        
        @endif
@else
                
@endif