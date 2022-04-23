@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        @include('livewire.surau.menu')
        <div class="row">
                    <div class="col-6" >
                        <div class="card" style="min-height: 340px">
                            <div class="card-body">
                                <table width="100%">
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Fund Name</td><td>{{ $fund->name }}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Description</td><td>{!! $fund->description !!}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Contribution Target</td><td>
                                        @if(!empty($fund->target))RM{!! number_format($fund->target,2) !!}@else - @endif<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Total Contribution</td><td>RM{!! number_format($fund->Contributor()->sum('contribution'),2) !!}<td></tr>
                                    <tr><td class="fw-bold" style="height: 30px;" width="40%">Expiry Date</td><td>@if(!empty($fund->expiry_date)){{ Carbon\Carbon::parse($fund->expiry_date)->format('d, M Y') }}@else No Expiry Date @endif<td></tr>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="col-6">
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
                     
                        <div class="col-lg-4">
                             <h4 class="card-title mt-4">Settlement</h4> 
                            
                        </div>
                        <div class="col-lg-8 d-flex justify-content-end">
                      
                               
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
                                

                                @if(in_array('Owner',$roles))

                                    <div class="app-search">
                                        <div class="position-relative">
                                        <button type="button" onclick="window.location.href='{{ route('khairatkematian')}}'" class="btn btn-primary waves-effect waves-light pb5">Contribute</button>
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
                                    <th class="align-middle">Contribution Amount</th>
                                    <th class="align-middle text-center">Payment Receipt</th>
                                    <th class="align-middle text-center">Payment Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($fundusers as $fund)
                                <tr>
                                    <td>
                                    <a href="{{ route('userprofile',['uid'=>$fund->user->id])}}"> {{ $fund->user->usercode }}</a>
                                    </td>
                                    <td><img src="{{ isset($fund->user->avatar) ? Storage::url($fund->user->avatar) : asset('/assets/images/user.png') }}" alt="Avatar" class="rounded-circle header-profile-user" > {!! strtoupper($fund->user->name) !!}</td>
                                    <td>

                                    @if(isset($fund->Addresses()->first()->street)){{ $fund->Addresses()->first()->street }},@endif @if(isset($fund->Addresses()->first()->location)){{ $fund->Addresses()->first()->location }} @endif

                                    </td>
                                    <td>
                                     @if(!empty($fund->contribution))RM{!! number_format($fund->contribution,2) !!}@endif
                                    </td>                                  
                                    <td class="text-center">

                                    @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-dark btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.fundreceipt','Payment Receipt','$fund->paymentkey')\"",
                                                                'label'=>'View',
                                                                'icon'=>'<i class="bx bx-search-alt-2 font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                    ])
                                    
                                    </td>
                                    <td class="text-center">
                                      
                                      {{$fund->paymentstatus}}
                                  
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
                        {{ $fundusers->links() }}
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
<!-- apexcharts -->
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