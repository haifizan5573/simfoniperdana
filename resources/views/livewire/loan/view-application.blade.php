
@section('title')
Application Details
@endsection
@section('css')

<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<style>
.scrollClass {
  height:150px;
  width: 100%;
  overflow-y: scroll;
}
</style>
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
<div>
    <div class="row">
   
        <div class="col-12">
            <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- customer details -->
                                <div class="row">
                                    <div class="col-4 d-flex">
                                        <h4 class="card-title">Application Details</h4> 
                                    </div>
                                    <div class="col-8 d-flex">
                                        <button type="button" wire:click="togglebutton('buttcustdetails')" class="btn @if($buttcustdetails)btn-primary @else btn-outline-light  @endif  waves-effect ms-2">Customer Details</button>
                                        <button type="button" wire:click="togglebutton('buttdocument')" class="btn @if($buttdocument)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Document Checklist</button>
                                        <button type="button" wire:click="togglebutton('butthistory')" class="btn @if($butthistory)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Application History</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                            @if($buttcustdetails)
                            
                                <div class="row mb-0">
                                    <div class="col-6">
                                            <h6 class="mb-3">Customer Details :</h6>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end mb-2">
                                            @can('app-edit')
                                         
                                                @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                            'onclick'=>"wire:click=\"open('livewire.form.customer','Edit Customer Details',$loan->id)\"",
                                                            'label'=>'Edit',
                                                            'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"editcust",
                                                        ])
                                            
                                            @endcan
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-12 card border shadow-none card-body">

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Name','desc'=>$customer->name])

                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'IC No.','desc'=>$customer->icnumber])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Phone','desc'=>$contact->phonenumber])

                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Customer','desc'=>$customer->email])

                                        </dl>

                                        <dl class="row mb-0">
                                            
                                        @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-10','label'=>'Address','desc'=>$fulladdressview])

                                        </dl>
                                                    
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-6">
                                            <h6 class="mb-3">Employment Details :</h6>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end mb-2">
                                            @can('app-edit')
                                         
                                                @include('components.button',[
                                                            'type'=>'button',
                                                            'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                            'onclick'=>"wire:click=\"open('livewire.form.employer','Edit Employment Details',$loan->id)\"",
                                                            'label'=>'Edit',
                                                            'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                            'loader'=>true,
                                                            'targetloader'=>"editcust",
                                                        ])
                                            
                                            @endcan
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-12 card border shadow-none card-body">

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Job Title','desc'=>$customer->jobtitle])

                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Emp. Name','desc'=>$employername])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Phone','desc'=>$employerphone])

                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Date Joined','desc'=>$datejoinedformatted])
                                        </dl>

                                        <dl class="row mb-0">
                                            
                                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-10','label'=>'Address','desc'=>$employeraddress])
    
                                        </dl>
                                                    
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-6">
                                            <h6 class="mb-3">Payslip :</h6>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end mb-2">
                                            @can('app-edit')

                                            @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-light btn-sm waves-effect waves-light mx-2',
                                                                'onclick'=>"wire:click=\"open('livewire.form.payslipattachment','Add/Edit Attachment',$loan->id)\"",
                                                                'label'=>(!empty($payslipattachmentview))?'Edit Attachment':'Add Attachment',
                                                                'icon'=>'<i class="bx bx-paperclip font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"editloan",
                                                            ])
                                        
                                                @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.payslip','Edit Payslip',$loan->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"editloan",
                                                            ])
                                            @endcan
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-12 card border shadow-none card-body">

                                        <dl class="row mb-0">
                                           <div class="col-3 fw-bold">Income</div>
                                           <div class="col-3 fw-bold">Amount</div>
                                           <div class="col-3 fw-bold">Deduction</div>
                                           <div class="col-3 fw-bold">Amount</div>
                                        </dl>
                                        <dl class="row mb-0 mt-2">
                                           <div class="col-6">
                                               @if(!empty($basicincome))
                                                    <div class="row">
                                                        <div class="col-6">
                                                          Basic Income
                                                        </div>
                                                        <div class="col-6">
                                                          @if(!empty($basicincome))RM {!!number_format($basicincome,2) !!}@endif
                                                        </div>
                                                    </div>
                                               @endif
                                               @foreach($income as $inc)

                                                    <div class="row">
                                                        <div class="col-6">
                                                          {{$inc->name}}
                                                        </div>
                                                        <div class="col-6">
                                                          @if(!empty($inc->amount))RM {!!number_format($inc->amount,2) !!}@endif
                                                        </div>
                                                    </div>
                                               @endforeach
                                           </div>
                                           <div class="col-6">
                                           @foreach($deduction as $deduct)
                                            <div class="row">
                                                <div class="col-6">
                                                {{$deduct->name}}
                                                </div>
                                                <div class="col-6">
                                                @if(!empty($deduct->amount))RM {!!number_format($deduct->amount,2) !!}@endif
                                                </div>
                                            </div>
                                            @endforeach
                                           </div>
                                        </dl>
                                        <hr/>
                                        <dl class="row mb-0">
                                           <div class="col-3 ">Total Income</div>
                                           <div class="col-3 fw-bold">  
                                               @if(!empty($totalincome))RM {!!number_format($totalincome,2) !!}@endif
                                            </div>
                                           <div class="col-3 ">Total Deduction</div>
                                           <div class="col-3 fw-bold">
                                                @if(!empty($totaldeduction))RM {!!number_format($totaldeduction,2) !!}@endif
                                           </div>
                                        </dl>
                                        <hr/>
                                        <dl class="row mb-0">
                                           <div class="col-3">
                                               @if(!empty($payslipattachmentview))

                                                 <a href="{!! Storage::url($payslipattachmentview->path) !!}" target="_blank"><i class="bx bx-paperclip"></i> Payslip</a>

                                               @endif
                                           </div>
                                           <div class="col-3 fw-bold"></div>
                                           <div class="col-3 ">Net Income</div>
                                           <div class="col-3 fw-bold">
                                           @if(!empty($netincome))RM {!!number_format($netincome,2) !!}@endif
                                           </div>
                                        </dl>
                                        <dl class="row mb-0">
                                           <div class="col-3 fw-bold"></div>
                                           <div class="col-3 fw-bold"></div>
                                           <div class="col-3">% Net Income</div>
                                           <div class="col-3 fw-bold">
                                           @if(!empty($netincomepercen)){!!round($netincomepercen,2) !!}%@endif
                                           </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- loan details -->
                                <div class="row mb-0">
                                    <div class="col-6">
                                            <h6 class="mb-3">Loan Application Details :</h6>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end mb-2">
                                            @can('app-edit')
                                        
                                                @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.loan','Edit Loan Details',$loan->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"editloan",
                                                            ])
                                            @endcan
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-12 card border shadow-none card-body">

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Product Group','desc'=>$productgroup])

                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Product Name','desc'=>$productname])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Submitted','desc'=>$datesubmittedformatted])

                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Approved','desc'=>$dateapprovedformatted])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Amount Applied','desc'=>(!empty($amountapplied))?"RM".number_format($amountapplied,2):""])

                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Amount Approved','desc'=>(!empty($amountapproved))?"RM".number_format($amountapproved,2):""])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Tenure Applied','desc'=>(!empty($tenureapplied))?$tenureapplied." Year(s)":""])

                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Tenure Approved','desc'=>(!empty($tenureapproved))?$tenureapproved." Year(s)":""])
                                        </dl>

                                        <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Disbursed','desc'=>$datedisbursedformatted])

                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Rejected','desc'=>$daterejectedformatted])
                                        </dl>

                                    

                                        
                                                    
                                    </div>
                                </div>
                            @endif

                            @if($buttdocument)

                            <form wire:submit.prevent="editdocu" >
                            <table class="table table-bordered align-middle">
                                <thead>

                                <td><strong>Basic Documents</strong></td>
                                <td><strong>Additional Documents</strong></td>

                                </thead>
                                <tbody>
                                <tr><td valign="top">


                                    @foreach($doclist as $docu)
                                    <div class="row">
                                            <div class="col-md-10">{{ $docu->name}}</div>
                                         
                                            <div class="col-md-2">
                                        
                                            <input class="form-check-input" style=" border-radius: .25em;
                                                height: 20px;
                                                width: 20px;"  type="checkbox"  wire:model="docstatus.{{$docu->id}}">
                                    
                                            </div>
                                        
                                    </div>
                                    <hr/>
                                    @endforeach
                                
                                    </td>
                                    <td valign="top">
                                    
                                    @foreach($doclistadd as $docu)
                                        <div class="row" >
                                                <div class="col-md-10">{{ $docu->name}}</div>
                                                <!-- <div class="col-md-6">
                                                    @if($docu->remark_status==1)
                                                    <input type="text" class="form-control"  value="" wire:model="docremark.{{$docu->id}}">
                                                    @endif
                                                </div> -->
                                                <div class="col-md-2 d-flex align-items-end">
                                            
                                                <input class="form-check-input" style=" border-radius: .25em;
                                                height: 20px;
                                                width: 20px;"  type="checkbox"  wire:model="docstatus.{{$docu->id}}">
                                        
                                                </div>
                                            
                                        </div>
                                    <hr/>
                                    @endforeach     
                                    </td>
                                    </tr>
                                    </tbody>
                                </table>

                                @can('app-edit')

                                <div class="row">
                                        <div class="col-12">
                                        @include('components.button',[
                                            'type'=>'submit',
                                            'class'=>'btn btn-primary',
                                            'onclick'=>'',
                                            'label'=>'Submit Changes',
                                            'target'=>'editdocu'
                                        ])
                                        </div>
                                </div>

                                @endcan
                            
                            </form>




                            @endif
                            
                            </div>
                        </div>       
                    </div>
                    <div class="col-md-4">
                        <!-- comment section -->
                        <div class="card">
                            <div class="card-body" > 
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Remark</h4>
                                    </div>
                                    <div class="scrollClass" style="min-height:400px !important;">
                                            <ul class="verti-timeline list-unstyled">
                                                @foreach($loan->Remarks()->orderby('created_at','desc')->get() as $remark)
                                                <li class="event-list pb-0 mb-0">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                        <div class="media mb-0">                                        
                                                            <div class="media-body">
                                                                <h5 class="font-size-10">{{ $remark->User()->first()->name }} <small class="text-muted float-end">{{ $remark->created_at->format('d M Y H:i') }}</small></h5>
                                                                {!! $remark->remark !!}  
                                                                        
                                                            </div>
                                                        </div>
                                                </li>
                                                @endforeach                   
                                            </ul>             
                                    </div>     
                                </div>
                                <hr/>
                                <h6><i class="bx bx-comment-dots me-1"></i>{{ $loan->Remarks()->count() }} comment(s)</h6>
                            
                                <div wire:ignore>
                                    <form wire:submit.prevent="addremark">
                                            @include('components.textarea',[
                                                            'element'=>'remark',
                                                            'name'=>'remark',
                                                            'content'=>'',
                                                            'label'=>'Remark',
                                                            ])   
                                        <div class="row mt-2">
                                                    <div class="col-12">
                                    
                                                                    <div class="input-group">
                                                                    
                                                                        <input type="file" wire:model="attachment" class="form-control"  placeholder="Attach File">
                                                                    </div>
                                                                
                                                    </div>
                                        </div>
                                        @include('components.button',[
                                                        'type'=>'submit',
                                                        'class'=>'btn btn-primary btn-sm mt-2',
                                                        'onclick'=>'',
                                                        'label'=>'Add Remark',
                                                        'target'=>'addremark'
                                                    ])
                                        @error('remark') <span class="error">{{ $message }}</span> @enderror
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body" >   
                                <h4 class="card-title">Application Details</h4>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                            
                                        @can('app-edit')

                                        @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-light btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.loandetails','Edit Application Details',$loan->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"editloandetails",
                                                            ])
                                          
                                        @endcan
                                    </div>
                                    <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-7','label'=>'FileID','desc'=>$fileid])

                                    </dl>
                                    <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-7','label'=>'Agent ID','desc'=>$agentname])

                                    </dl>

                                    <dl class="row mb-0">
                                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-7','label'=>'Status','desc'=>$status])

                                    </dl>



                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            
        </div>
    
    </div>
    

    
    @include('components.modal',['size'=>'lg'])  
                                        
</div>




@push('scripts')
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>



tinymce.init({
  selector: 'textarea#remark',  // change this value according to your HTML
  height : "300",
  oninit : "setPlainText",
  plugins : "paste",
  forced_root_block : false,
  menubar: '',
  content_style: "body {font-size: 10pt;}",
  setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('remark', editor.getContent());
            });
        }
  });


window.livewire.on('cleartext', () => {
        tinyMCE.activeEditor.setContent('');
});

window.livewire.on('closemodal', data => {
    $('#appmodal').modal('hide'); 
});

window.livewire.on('modal', data => {


    $('#appmodal').modal('show'); 

    $(window).on('shown.bs.modal', function(e) { 
        e.preventDefault();
       

    });

    
    if(data[0]=="livewire.form.customer"){
            @this.set('postcode', {{$postcode}}); 

            $('#postcode').select2({
                    placeholder: @if(!empty($postcode))'{{$postcode}}'@else'Select Postcode'@endif,
                    dropdownParent:  $("#appmodal"),
                    width: '250px',
                    tags: false, selectOnBlur: true,
                    ajax: {
                        url:  "{{route('postcode')}}@if(!empty($postcode))?q={{$postcode}} @endif",
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

            $('#postcode').on('change', function(e) {

            let data = $(this).val();
                @this.set('postcode', data);        
            });
    }

    if(data[0]=="livewire.form.employer"){
            $('#employer').select2({
                    placeholder: @if(!empty($employername))'{{$employername}}'@else'Select Employer'@endif,
                    dropdownParent:  $("#appmodal"),
                    width: '350px',
                    tags: false, selectOnBlur: true,
                    ajax: {
                        url:  "{{route('employer')}}@if(!empty($employername))?q={{$employername}} @endif",
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
                        }
                    }
            });

            $('#employer').on('change', function(e) {

                let data = $(this).val();
                    @this.set('employer', data);        
            });

         

             $('#datejoined').datepicker({
                todayHighlight: true,
                format: 'dd M, yyyy',
                }).on('changeDate', function(e){
                $(this).datepicker('hide');
                @this.set('datejoined', $('#datejoined').val());
            });

            $('#datejoined').datepicker('setDate', '{{$datejoinedformatted}}');
    }

    if(data[0]=="livewire.form.loan"){

            @this.set('productgroup', {{$productgroupid}}); 

            $('#productgroup').select2({
                    placeholder: @if(!empty($productgroupid))'{{$productgroup}}'@else'Select Product Group'@endif,
                    dropdownParent:  $("#appmodal"),
                    width: '350px',
                    tags: false, selectOnBlur: true,
                    ajax: {
                        url:  "{{route('productgroup')}}",
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

            $('#productgroup').on('change', function(e) {

            let data = $(this).val();
                @this.set('productgroup', data);        
            });

            $('#tenureapplied').select2({
                    placeholder: @if(!empty($tenureapplied))'{{$tenureapplied}}'@else'Select Tenure Applied'@endif,
                    dropdownParent:  $("#appmodal"),
                    width: '350px',
                    tags: false, selectOnBlur: true,
                    ajax: {
                        url:  "{{route('tenure')}}",
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

            $('#tenureapplied').on('change', function(e) {

            let data = $(this).val();
                @this.set('tenureapplied', data);        
            });

            $('#tenureapproved').select2({
                    placeholder: @if(!empty($tenureapplied))'{{$tenureapproved}}'@else'Select Tenure Approved'@endif,
                    dropdownParent:  $("#appmodal"),
                    width: '350px',
                    tags: false, selectOnBlur: true,
                    ajax: {
                        url:  "{{route('tenure')}}",
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

            $('#tenureapproved').on('change', function(e) {

            let data = $(this).val();
                @this.set('tenureapproved', data);        
            });


            $('#datesubmitted').datepicker({
                todayHighlight: true,
                format: 'dd M, yyyy',
                }).on('changeDate', function(e){
                $(this).datepicker('hide');
                @this.set('datesubmitted', $('#datesubmitted').val());
            });

            $('#datesubmitted').datepicker('setDate', '{{$datesubmittedformatted}}');

            $('#dateapproved').datepicker({
                todayHighlight: true,
                format: 'dd M, yyyy',
                }).on('changeDate', function(e){
                $(this).datepicker('hide');
                @this.set('dateapproved', $('#dateapproved').val());
            });

            $('#dateapproved').datepicker('setDate', '{{$dateapprovedformatted}}');


            $('#datedisbursed').datepicker({
                todayHighlight: true,
                format: 'dd M, yyyy',
                }).on('changeDate', function(e){
                $(this).datepicker('hide');
                @this.set('datedisbursed', $('#datedisbursed').val());
            });

            $('#datedisbursed').datepicker('setDate', '{{$datedisbursedformatted}}');



            $('#daterejected').datepicker({
                todayHighlight: true,
                format: 'dd M, yyyy',
                }).on('changeDate', function(e){
                $(this).datepicker('hide');
                @this.set('daterejected', $('#daterejected').val());
            });

            $('#daterejected').datepicker('setDate', '{{$daterejectedformatted}}');

    }

    if(data[0]=="livewire.form.loandetails"){



        @this.set('agentid', {{$agentid}}); 

        $('#agentid').select2({
                placeholder: @if(!empty($agentid))'{{$agentname}}'@else'Select Agent'@endif,
                dropdownParent:  $("#appmodal"),
                width: '350px',
                tags: false, selectOnBlur: true,
                ajax: {
                    url:  "{{route('listagent')}}",
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

        $('#agentid').on('change', function(e) {

        let data = $(this).val();
            @this.set('agentid', data);        
        });


        $('#appstatus').select2({
                placeholder: @if(!empty($status))'{{$status}}'@else'Select Status'@endif,
                dropdownParent:  $("#appmodal"),
                width: '350px',
                tags: false, selectOnBlur: true,
                ajax: {
                    url:  "{{route('status')}}@if(!empty($appstatus))?q={{$appstatus}} @endif",
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

        $('#appstatus').on('change', function(e) {

        let data = $(this).val();
            @this.set('appstatus', data);        
        });


    }

            

       

});

window.livewire.on('location', pcode => {

  
    @this.set('location','{{$location}}'); 
    $('#location').select2({
            placeholder: @if(!empty($location))'{{$location}}'@else'Select Location'@endif,
            dropdownParent:  $("#appmodal"),
            width: '450px',
            tags: false, selectOnBlur: true,
            ajax: {
                url: "{{route('location')}}/"+pcode,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
                },
            }
    });

    $('#location').on('change', function(e) {

    let data = $(this).val();
        @this.set('location', data);        
    });


});

window.livewire.on('productname', pname => {

  
        @this.set('productname','{{$productnameid}}'); 
        $('#productname').select2({
                placeholder: @if(!empty($productname))'{{$productname}}'@else'Select Product Name'@endif,
                dropdownParent:  $("#appmodal"),
                width: '370px',
                tags: false, selectOnBlur: true,
                ajax: {
                    url: "{{route('productname')}}/"+pname,
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
                }
        });

        $('#productname').on('change', function(e) {

        let data = $(this).val();
            @this.set('productname', data);        
        });


});


</script>


@include('components.toastr') 

@endpush