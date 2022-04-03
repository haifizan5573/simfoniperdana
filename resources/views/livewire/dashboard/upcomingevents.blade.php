<div class="col-xl-4">
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

                                        <div class="tab-content mt-4" style="min-height: 340px;">
                                            @foreach($suraucat as $cat)

                                            <div class="tab-pane @if($b==0) active @endif" id="ab{{$cat->id}}" role="tabpanel">
                                                
                                                 <table class="table">
                                                 @foreach($cat->Surau()->get() as $act)

                                                    <tr>
                                                    <td>
                                                       {{$act->description}}<br/>
                                                       <small>{{ $act->name}}</small>
                                                    </td>
                                                    <td>
                                                        <i class="bx bx-time-five align-middle me-1"></i> {!! $formatter->formatDate2($act->start_date) !!}
                                                    </td>
                                                    </tr>

                                                 @endforeach
                                                </table>                
                                           </div>

                                                @php
                                                $b++;
                                                @endphp
                        
                                            @endforeach
                                           
                                     
                                        </div>
                                    </div>
                                </div>
</div>