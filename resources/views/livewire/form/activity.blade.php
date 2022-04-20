
   <ul class="verti-timeline list-unstyled">

@foreach($activity as $act)

<li class="event-list pb-0 mb-0">
<div class="event-timeline-dot">
    @if($act->start_date==date('Y-m-d')." 00:00:00")
    <i class="bx bx-right-arrow-circle bx-fade-right"></i>
    @else
    <i class="bx bx-right-arrow-circle"></i>
    @endif
</div>
    <div class="media mb-2">                                        
        <div class="media-body">
           
        <div class="row">
           
            <div class="col-6">
                {{ $act->name}}
                <small class="text-truncate">
                @if($act->start_date < date('Y-m-d')." 00:00:00")
                <strike> {!! \Illuminate\Support\Str::limit($act->description,20,' ..')  !!}</strike>
                @else
                {!! \Illuminate\Support\Str::limit($act->description,20,' ..') !!}
                @endif
                <br/>
                </small>
            </div>
            <div class="col-6">
            <i class="bx bx-time-five align-middle me-1"></i> {!! $formatter->formatDate2($act->start_date) !!}
            </div>
        </div> 
                    
        </div>
    </div>
 </li>

@endforeach
</ul>