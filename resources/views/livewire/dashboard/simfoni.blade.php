<div class="row">
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
</div>

