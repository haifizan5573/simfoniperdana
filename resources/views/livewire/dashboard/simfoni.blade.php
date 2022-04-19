<!-- <div class="row">
    <div class="col-11">
        <div class="text-nowrap overflow-auto">
            <div class="row flex-row flex-nowrap">

                @foreach($simfoni as $data)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $data->title }}</h5>
                            <div class="py-3 border-top">
                                        <ul class="list-inline mb-0 d-flex">
                                            <li class="list-inline-item">
                                                <i class="mdi mdi-account-group"></i> {{$data->User()->count()}} Registered
                                            </li>
                                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            
        </div>
    </div>
    <div class="col-1 align-middle">
        <i class="bx bx-right-arrow-circle bx-fade-right mt-4" style="font-size: 32px;"></i> 
    </div>
</div> -->
<h5>Simfonians</h5>
<div class="col-lg-12">
    <div class="row mb-2">
       
            


            @foreach($simfoni as $data)
                <div class="col-4">
                  
                        <div class="card  p-4 mb-2  ">
                            <div class="text-center"><img class="rounded avatar-sm" src="assets/images/community/simfoni/{{$data->icon}}" alt="" height="40"></div>
                            <small class="text-center">{{ $data->title }}</small>
                                <div class="bg-transparent border-top mt-2">
                                        <div class="mt-2">
                                            <div class="text-left">
                                                <a href=""><small>{{$data->User()->count()}} Registered</small></a>
                                            </div>
                                            
                                        </div>
                                </div>
                        </div>
                   
                </div>
            @endforeach
        
       
    </div>
</div>
