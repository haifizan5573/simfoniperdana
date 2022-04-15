<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                                    <div class="app-search ">
                                        <div class="position-relative">
                                        <select class="form-control" wire:model="filter">
                                        
                                        @for($dt=2021;$dt<=date('Y');$dt++)                      
                                            <option value="{{$dt}}">Khairat Kematian for year {{$dt}}</option>
                                        @endfor
                                        </select>  
                                        <span class="bx bx-filter-alt"></span>
                                        </div>
                                    </div>
                </div>
                 <h4 class="card-title mb-3">Khairat Fund</h4>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-0">
                            <p>Available Balance</p>
                            <h4>{{$balance}}</h4>

                             <!-- <p class="text-muted mb-4"> <i class="mdi mdi-arrow-up ms-1 text-success"></i></p> -->
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="mb-2">Total Fund</p>
                                        <h5>{{$total}}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="mb-2">Expense</p>
                                        <h5>{{$expense}}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="mb-2">Total Registration</p>
                                        <h5>{{$totalreg}}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('khairat')}}" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-6 align-self-center">
                       
                    </div>
                </div>                                  
             </div>
        </div>
    </div>
</div>