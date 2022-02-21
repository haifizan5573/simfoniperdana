

@section('content')

<div class="row mb-0">
                    <div class="col-12 card border shadow-none card-body">

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Name','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'IC No.','desc'=>": "])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Phone','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Address','desc'=>": "])
                        </dl>
                                      
                    </div>
</div>

@endsection