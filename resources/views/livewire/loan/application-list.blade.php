@section('css')

<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 d-flex">
                                <h4 class="card-title">All Application</h4> 
                    </div>
                    <div class="col-lg-10 d-flex justify-content-end">

                            <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                            </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle">App. ID</th>
                                        <th class="align-middle"><a wire:click="sortBy()">Customer Name</a></th>
                                        <th class="align-middle">IC No.</th>
                                        <th class="align-middle">Phone</th>
                                        <th class="align-middle">Product Applied</th>
                                        <th class="align-middle">Amount Applied</th>
                                        <th class="align-middle">Latest Remark</th>
                                        <th class="align-middle">Status</th>
                                    </tr>
                                <thead>
                                @foreach($loans as $loan)
                                    <tr>
                                        <td><a href="{{route('viewapp',['appid'=>$loan->id])}}">{{$loan->appid}}</a></td>
                                        <td>{{$loan->Customer->name}}</td>
                                        <td>{{$loan->Customer->icnumber}}</td>
                                        <td>{{$loan->Customer->Contacts()->first()->phonenumber}}</td>
                                        <td>@if(isset($loan->Product->name)){{$loan->Product->name}}@else - @endif</td>
                                        <td>{{$loan->amountapplied}}</td>
                                        <td>
                                            @if(isset($loan->Remarks->last()->remark))
                                            {!!$loan->Remarks->last()->remark!!}
                                            @endif
                                        </td>
                                        <td>
                                            @if($loan->Status()->first()->name)
                                            {{$loan->Status()->first()->name}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
                <div class="row mt-10 ml-4">
                        <div class="mt-10 ml-110">
                        {{ $loans->links() }}
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')

@if(!empty($toastrdata['message']))
    <script>
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });
    </script>
    @endif

@include('components.toastr') 

@endpush