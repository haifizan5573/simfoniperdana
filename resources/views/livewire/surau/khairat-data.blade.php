@section('css')


<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                             <h4 class="card-title mt-4">Khairat Kematian</h4> 
     
                        </div>
                       
                        <div class="col-lg-6 d-flex justify-content-end">
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                       User ID
                                    </th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Home Unit</th>
                                    <th class="align-middle">Membership Type</th>
                                    <th class="align-middle text-center">Membership Fee</th>
                                    <th class="align-middle text-center">Payment Status</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($khairats as $khairat)
                                <tr>
                                    <td>
                                       {{ $khairat->user->usercode }}
                                    </td>
                                    <td>{{ $khairat->user->name }}</td>
                                    <td>

                                    @if(isset($khairat->Addresses()->first()->location)){{ $khairat->Addresses()->first()->location }}@endif @if(isset($khairat->Addresses()->first()->unit)) ,{{ $khairat->Addresses()->first()->unit }} @endif

                                    </td>
                                    <td>
                                   
                                    {{ $khairat->Membership()->first()->name }}
                                 
                                    </td>                                  
                                    <td class="text-center">
                                    {{ $khairat->Membership()->first()->other }}
                                    </td>
                                    <td class="text-center">

                                    <span class="badge badge-pill {{ ($khairat->status==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11">{{ $khairat->Label()->first()->name }}</span>

                                    </td>
                                    <td class="text-center">
                                     
                                   
                                    </td>
                                </tr>
                            @endforeach
        
                            </tbody>
                        </table>
                    </div>
               
                    <!-- end table-responsive -->
                </div>
            </div>
            <div class="row mt-10">
                        <div class="mt-10 ml-110">
                        {{ $khairats->links() }}
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