

@section('title')
    Surau Actvity - {{ $category }}
@endsection

@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection





    @section('body')

        <body  style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-repeat: no-repeat; background-position: center;  background-position:fixed; 
        background-size: 100% 100%;  ">
    @endsection


   
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

            
            <div class="row d-flex justify-content-center mb-2">
                     <div class="col-md-3">
                        <!-- <img src="{{ URL::asset('/assets/images/SimfoniPerdanaTransparent.png') }}" alt=""
                                            width="200"> -->
                     </div>

            </div>

                <div class="row justify-content-center">

                
                    <div class="col-md-9">
                        <div class="card overflow-hidden">
                            <div >
                                <div class="row">
                                  
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                
                                                <h5 class="text-primary">Surau Activity - {{ $category }}</h5>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-center">
                                                        <img src="{{ URL('assets/images/activities') }}/{{$image}}" class="img-fluid rounded" alt="" style="height:300px">
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        {{ $description }}

                                                        @foreach($activitiestoday as $today)
                                                            
                                                        @endforeach
                                                    </div>
                                                </div>    
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                            <h5>Today's Events</h5>
                                                            @foreach($activitiestoday as $today)
                                                                <div class="row mb-2">
                                                                        <div class="col-6">
                                                                            {{ $today->name}} @if(!empty($today->description)) - {!! \Illuminate\Support\Str::limit($today->description,20,' ..') !!}@endif<br/>
                                                                            <small>    
                                                                            <i class="bx bx-time-five align-middle me-1"></i> {!! date('d M,Y') !!}
                                                                            </small>
                                                                        </div>
                                                                        <div class="col-6">
                                                                      
                                                                        </div>
                                                                </div>
                                                              
                                                            @endforeach

                                                            @if(count($activitiestoday)==0)
                                                                <small>No Event</small>
                                                            @endif

                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                            <h5>Upcoming Events</h5>
                                                            @foreach($activitiesupcoming as $upcoming)

                                                              <div class="row mb-2">
                                                                        <div class="col-6">
                                                                            {{ $upcoming->name}} @if(!empty($upcoming->description)) - {!! \Illuminate\Support\Str::limit($upcoming->description,20,' ..') !!}@endif<br/>
                                                                            <small>    
                                                                            <i class="bx bx-time-five align-middle me-1"></i> {!! $formatter->formatDate2($upcoming->start_date) !!}
                                                                            </small>
                                                                        </div>
                                                                        <div class="col-6">
                                                                      
                                                                        </div>
                                                                </div>
                                                              
                                                            @endforeach

                                                            @if(count($activitiesupcoming)==0)
                                                                <small>No Event</small>
                                                            @endif

                                                    </div>
                                                </div>
                                                
                                              
                                               
                          
                                        </div>
                                    </div>
                            </div>

                      
                        
                        </div>
                    

                    </div>
                </div>
    
            </div>
        </div>
 
        <!-- end account-pages -->




@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>


$( document ).ready(function() {
    livewire.emit('load',0);
});
window.livewire.on('load', data => {
      
                    $('#street').select2({
                            placeholder: 'Select Street No',
                           
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('streetlist')}}",
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                return {
                                
                                    results:  $.map(data, function (item) {
                                    
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                                },
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#street').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('street', dataval);        
                    });


                    $('#membership').select2({
                            placeholder: 'Select Membership Type',
                           
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/surau_khairat_membership",
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                return {
                                
                                    results:  $.map(data, function (item) {
                                    
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                                },
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#membership').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('membership', dataval);        
                    });

                  
            
     
});
</script>
@include('components.toastr') 
@endpush
