<div class="row">
    <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Upcoming</h4>

                                        <ul class="nav nav-pills bg-light rounded" role="tablist">
                                                @php
                                                $a=0;
                                                @endphp

                                            @foreach($suraucat as $cat)
                                            
                                            <li class="nav-item">
                                                <a class="nav-link  @if($a==0) active @endif" data-bs-toggle="tab" href="#ab{{$cat->id}}" role="tab">
                                                    {{ $cat->name }}
                                                </a>
                                            </li>

                                                @php
                                                    $a++;
                                                @endphp

                                            @endforeach
                                          
                                        </ul>

                                                @php
                                                $b=0;
                                                @endphp

                                        <div class="tab-content mt-4" >
                                            @foreach($suraucat as $cat)

                                            <div class="tab-pane @if($b==0) active @endif" id="ab{{$cat->id}}" role="tabpanel">
                                                 <div class="scrollClass" style="height:200px !important;">
                                                    <ul class="verti-timeline list-unstyled">

                                                    @foreach($cat->Surau()->get() as $act)

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
                                                   
                                                </div>              
                                           </div>

                                                @php
                                                $b++;
                                                @endphp
                        
                                            @endforeach
                                           
                                     
                                        </div>
                                    </div>
                                </div>
    </div>
</div>