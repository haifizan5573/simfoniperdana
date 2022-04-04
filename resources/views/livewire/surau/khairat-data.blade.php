@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                             <h4 class="card-title mt-4">Khairat Kematian (Mutual Benevolent)</h4> 
                            
                        </div>
                       
                        <div class="col-lg-8 d-flex justify-content-end">
                                @can('update-khairat')
                                    <div class="app-search m-2">
                                        <div class="position-relative">
                                        <select class="form-control" wire:model="filter">
                                        
                                        @for($dt=2021;$dt<=date('Y');$dt++)                      
                                            <option value="{{$dt}}">Khairat Kematian for year {{$dt}}</option>
                                        @endfor
                                        </select>  
                                        <span class="bx bx-filter-alt"></span>
                                        </div>
                                    </div>
                               
                                <div class="app-search m-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                                @endcan
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
                                    <th class="align-middle text-center">Payment Receipt</th>
                                    <th class="align-middle text-center">Payment Status</th>
                                    @can('update-khairat')
                                    <th class="align-middle text-center">Action</th>
                                    @else
                                    <th class="align-middle text-center">Year</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($khairats as $khairat)
                                <tr>
                                    <td>
                                       {{ $khairat->user->usercode }}
                                    </td>
                                    <td>{!! strtoupper($khairat->user->name) !!}</td>
                                    <td>

                                    @if(isset($khairat->Addresses()->first()->street)){{ $khairat->Addresses()->first()->street }},@endif @if(isset($khairat->Addresses()->first()->location)){{ $khairat->Addresses()->first()->location }} @endif

                                    </td>
                                    <td>
                                   
                                    {!! nl2br($khairat->Membership()->first()->name) !!}
                                 
                                    </td>                                  
                                    <td class="text-center">
                                    {{ $khairat->Membership()->first()->other }}
                                    </td>
                                    <td class="text-center">
                                      
                                        @if(!empty($khairat->FileUpload->first()->path))
                                            @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-dark btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.khairatreceipt','Payment Receipt',$khairat->userid)\"",
                                                                'label'=>'View',
                                                                'icon'=>'<i class="bx bx-search-alt-2 font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                                            ])
                                        @endif
                                  
                                    </td>
                                    <td class="text-center">

                                    <span class="badge badge-pill {{ ($khairat->status==8)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11"> {!! nl2br($khairat->Label()->first()->name) !!}</span>

                                    </td>
                                    @can('update-khairat')
                                    <td class="text-center">

                                        
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.updatestatus','Edit - Update Status',$khairat->userid)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                            
                                    </td>
                                    @else
                                    <td class="text-center">
                                        @if(isset($khairat->khairat()->first()->year)){{$khairat->khairat()->first()->year}}@endif
                                    </td>
                                    @endcan
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
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>
    @if(!empty($toastrdata['message']))
   
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });

    
  
    @endif

        window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
            });

        window.livewire.on('modal', data => {

                $('#appmodal').modal('show'); 

                $(window).on('shown.bs.modal', function(e) { 
                    e.preventDefault();
                });

                if(data[0]=="livewire.form.updatestatus"){

                        $('#status').select2({
                        placeholder: data[3],
                        dropdownParent:  $("#appmodal"),
                        width: '350px',
                        tags: false, selectOnBlur: true,
                        ajax: {
                            url:  "{{route('label')}}/status_khairat",
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

                    $('#status').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('status', data);        
                    });
                }

               
        });
    </script>
@include('components.toastr')
@endpush