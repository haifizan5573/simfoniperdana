@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        @include('livewire.surau.menu')

        <div class="row">
                    <div class="col-12 col-md-6 col-lg-6" >
                        <div class="card" style="min-height: 340px">
                            <div class="card-body">
                            <h4 class="card-title">Khairat Fund - Khairat Kematian for Year {{$filter}}</h4>
                                <table width="100%">
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Total Registratiom</td><td>{{$totalreg}}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Available Balance</td><td>{{$balance}}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Total Fund</td><td>{{$total}}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Total Expense</td><td>{{$expense}}<td></tr>
                                   
                                </table>
                            </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="contribution" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
         <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             <h4 class="card-title mt-4">Khairat Kematian (Mutual Benevolent) - {{$khairatcount}} record(s)</h4> 
                            
                        </div>
                    </div>
                    <div class="row">
                     
                       
                        <div class="col-lg-12 d-flex justify-content-end">
                                @can('update-khairat')
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

                                    <!-- <div class="app-search ">
                                        <div class="position-relative">

                                        <select class="form-control" wire:model="street" id="street">
                                        
                                        </select>  
                                       
                                        <span class="bx bx-filter-alt"></span>
                                        </div>
                                    </div> -->
                               
                                <div class="app-search ">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                                <div class="app-search">
                                    <div class="position-relative">
                                        <select class="form-control" wire:model="street">
                                            <option value="">All</option>
                                            @foreach($streetlist as $list)
                                                <option value="{{$list['name']}}">{{$list['name']}}</option>
                                            @endforeach
                                        </select>  
                                        <span class="bx bx-filter-alt"></span>
                                    </div>
                                </div>
                                @endcan

                                @if(in_array('Owner',$roles))

                                    <div class="app-search">
                                        <div class="position-relative">
                                        <button type="button" onclick="window.location.href='{{ route('khairatkematian')}}'" class="btn btn-primary waves-effect waves-light pb5">Register</button>
                                        </div>
                                    </div>

                                @endif
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
                                    <a href="{{ route('userprofile',['uid'=>$khairat->user->id])}}"> {{ $khairat->user->usercode }}</a>
                                    </td>
                                    <td><img src="{{ isset($khairat->user->avatar) ? Storage::url($khairat->user->avatar) : asset('/assets/images/user.png') }}" alt="Avatar" class="rounded-circle header-profile-user" > {!! strtoupper($khairat->user->name) !!}</td>
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
                                      {{ $khairat->userid}}{{$khairat->khaira}}
                                        @if(!empty($khairat->FileUpload->first()->path))
                                            @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-dark btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.khairatreceipt','Payment Receipt',$khairat->userid,$khairat->khairat)\"",
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
                                                                'onclick'=>"wire:click=\"open('livewire.form.updatestatus','Edit - Update Status',$khairat->id,'')\"",
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
        </div>
    </div>
    @include('components.modal',['size'=>'lg'])  
</div>  
  
@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script>
    @if(!empty($toastrdata['message']))
   
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });

    
  
    @endif

$( document ).ready(function() {
    livewire.emit('load',0);
});
window.livewire.on('load', data => {
                   $('#street').select2({
                            placeholder: 'Select Street No',
                            dropdownAutoWidth : true,
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
});

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

        options = {
        chart: {
            type: 'bar',
            height: 300
        },
        series: [{
            name: "Total Contribution",
            data: {!! $plotdata !!}
        }],
        yaxis: {
          tickAmount: 10,
          labels: {
            formatter: function(val) {
              return val.toFixed(0);
            }
          },
          title: {
            text: 'Contribution'
          }
        },
        xaxis: {
          title: {
            text: 'Street No'
          },
        },
        stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return 'RM'+val
            }
          }
        },

}
var contribution = new ApexCharts(document.querySelector("#contribution"), options);
contribution.render();

    </script>
@include('components.toastr')
@endpush