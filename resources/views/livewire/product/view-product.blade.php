@section('css')

<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 d-flex">
                                <h4 class="card-title">Product Group Detail - {{ $productgroup }}</h4> 
                    </div>
                    <div class="col-lg-8 d-flex justify-content-end">

                            <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                            </div>
                            <div class="app-search">
                                    <div class="position-relative">
                                    <button type="button" onclick="window.location.href='{{ route('addproduct',['id'=>$groupid])}}'" class="btn btn-primary waves-effect waves-light pb5">Add Product</button>
                                    </div>
                            </div>

                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Product Name</th>
                                        <th class="align-middle text-center">Minimum Loan</th>
                                        <th class="align-middle">Maximum Loan</th>
                                        <th class="align-middle">Maximum Tenure</th>
                                        <th class="align-middle">Rates</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                <thead>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="align-middle">{{$product->name}}</td>
                                        <td class="align-middle text-center">
                                            @if(!empty($product->minloan))RM{{number_format($product->minloan,2)}}@endif
                                        </td>
                                        <td class="align-middle text-center">
                                            @if(!empty($product->maxloan))RM{{number_format($product->maxloan,2)}}@endif
                                        </td>
                                        <td class="align-middle">
                                            @if(!empty($product->maxtenure)){{$product->maxtenure}} Year(s)@endif
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach($product->Rates()->get() as $rate)

                                               <li>{{$rate->rates}}%</li>

                                            @endforeach
                                            </ul>
                                        
                                        </td>
                                        <td class="align-middle">
                                        <span class="badge badge-pill {{ ($product->status==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11">{{ $product->Status()->first()->name }}</span>
                                        </td>
                                        <td class="align-middle text-center">


                                        @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light mx-2',
                                                            'onclick'=>"onclick='window.location.href=\"".route('editproduct',['id'=>$product->id])."\"'",
                                                            'label'=>'Edit Product',
                                                            'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"",
                                                        ])

                                        </td>
                                       
                                    </tr>
                                @endforeach
                            </table>
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