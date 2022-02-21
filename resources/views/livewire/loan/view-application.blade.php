
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
@endsection
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
                            <button onclick="openModal('appmodal','customer','Edit Customer Details')" id="getModal" data-url="{{ route('modal',['id'=>'loan'])}}" class="btn btn-light btn-sm waves-effect waves-light">
                                <i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>Edit
                            </button>
                            @endcan
                    </div>
                </div>
                
                <div class="row mb-0">
                    <div class="col-12 card border shadow-none card-body">

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Name','desc'=>": ".$customer->name])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'IC No.','desc'=>": ".$customer->icnumber])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Phone','desc'=>": ".$contact->phonenumber])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Address','desc'=>": ".$address->address])
                        </dl>
                                      
                    </div>
                </div>
                <h6 class="mb-3">Employment Details :</h6>
                <div class="row mb-0">
                    <div class="col-12 card border shadow-none card-body">

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Job Title','desc'=>": ".$customer->name])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Emp. Name','desc'=>": ".$customer->icnumber])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Phone','desc'=>": ".$contact->phonenumber])

                            @include('components.dldt',['dlclass'=>'col-2 fw-bold','dtclass'=>'col-4','label'=>'Address','desc'=>": ".$address->address])
                        </dl>
                                      
                    </div>
                </div>
                <h6 class="mb-3">Payslip :</h6>
                <div class="row mb-0">
                    <div class="col-12 card border shadow-none card-body">

                      
                                      
                    </div>
                </div>
                <!-- loan details -->
                <div class="row mb-0">
                    <div class="col-6">
                            <h6 class="mb-3">Loan Application Details :</h6>
                    </div>
                    <div class="col-6 d-flex justify-content-end mb-2">
                            @can('app-edit')
                            <button onclick="openModal('appmodal','loan','Edit Loan Details')" id="getModal" data-url="{{ route('modal',['id'=>'loan'])}}" class="btn btn-light btn-sm waves-effect waves-light">
                                <i class="bx bx-edit-alt font-size-16 align-middle me-2"></i>Edit
                            </button>
                            @endcan
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-12 card border shadow-none card-body">

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Product Group','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Product Name','desc'=>": "])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Submitted','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Approved','desc'=>": "])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Amount Applied','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Amount Approved','desc'=>": "])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Tenure Applied','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Tenure Approved','desc'=>": "])
                        </dl>

                        <dl class="row mb-0">
                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Disbursed','desc'=>": "])

                            @include('components.dldt',['dlclass'=>'col-3 fw-bold','dtclass'=>'col-3','label'=>'Date Rejected','desc'=>": "])
                        </dl>

                       

                        
                                      
                    </div>
                </div>
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
    </div>
</div>



@push('scripts')
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
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



function openModal(id,pageid,title){

   $('#'+id).modal('show'); 

   $(window).on('shown.bs.modal', function(e) { 
        e.preventDefault();

        var url ="{{ route('modal') }}/"+pageid;

        document.getElementById('title').innerHTML =title;

       

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#dynamic-content').html('');    
            $('#dynamic-content').html(data); // load response 
            $('#modal-loader').hide();        // hide ajax loader   
        })
        .fail(function(){
            $('#dynamic-content').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>Form not found. Please try again later</div>');
            $('#modal-loader').hide();
        });

    });
}

</script>

@include('components.modal',['size'=>'lg'])
@endpush