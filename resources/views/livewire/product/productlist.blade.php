@section('css')

<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 d-flex">
                                <h4 class="card-title">Product Group</h4> 
                    </div>
                    <div class="col-lg-10 d-flex justify-content-end">

                            <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                            </div>
                            <div class="app-search">
                                    <div class="position-relative">
                                    <button type="button" onclick="window.location.href='{{ route('addproductgroup')}}'" class="btn btn-primary waves-effect waves-light pb5">Add Product Group</button>
                                    </div>
                            </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Group Name</th>
                                        <th class="align-middle text-center">No. Of Product</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                <thead>
                                @foreach($productgroups as $productgroup)
                                    <tr>
                                        <td>{{$productgroup->name}}</td>
                                        <td class="text-center">
                                            {{$productgroup->Products->count()}}
                                        </td>
                                        <td class="align-middle">
                                        <span class="badge badge-pill {{ ($productgroup->isactive==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11">{{ $productgroup->Status()->first()->name }}</span>
                                        </td>
                                        <td class="text-center">


                                        @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light mx-2',
                                                            'onclick'=>"onclick='window.location.href=\"".route('addproduct',['id'=>$productgroup->id])."\"'",
                                                            'label'=>'Add Product',
                                                            'icon'=>'<i class="bx bx-paperclip font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"",
                                                        ])

                                            @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                            'onclick'=>"onclick='window.location.href=\"".route('editproductgroup',['id'=>$productgroup->id])."\"'",
                                                            'label'=>'Edit',
                                                            'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"",
                                                        ])

                                            @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                            'onclick'=>"onclick='window.location.href=\"".route('viewproductgroup',['id'=>$productgroup->id])."\"'",
                                                            'label'=>'View Details',
                                                            'icon'=>'<i class="bx bx-search-alt font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"",
                                                        ])


                                        </td>
                                       
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
                <div class="row mt-10 ml-4">
                        <div class="mt-10 ml-110">
                        {{ $productgroups->links() }}
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