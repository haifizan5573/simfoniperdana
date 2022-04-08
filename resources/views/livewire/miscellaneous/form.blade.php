

@section('title')
    {{$title}}
@endsection

@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@if($type==0)
    @section('body')

        <body  style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-repeat: no-repeat; background-position: center;  background-position:fixed; 
        background-size: 100% 100%;  ">
    @endsection


   
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

            
            <div class="row d-flex justify-content-center mb-2">
                     <div class="col-md-3">
                        <!-- <img src="{{ URL::asset('/assets/images/SimfoniPerdanaTransparent.png') }}" alt=""
                                            width="200"> -->
                     </div>

            </div>
@endif
                <div class="row justify-content-center">

                
                    <div class="col-md-9">
                        <div class="card overflow-hidden">
                            <div >
                                <div class="row">
                                  
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                
                                                <h5 class="text-primary">{{$title}}</h5>

                                                {!! $description !!}

                                            </div>
                            
                                        </div>
                                    </div>
                            </div>

                            @if($show)
                            <div class="card-body pt-0">
                        
                                <div class="p-2">
                                    <form wire:submit.prevent="register" id="register">

                                         <div class="row mb-2" >
                                            <div class="col-md-12">
                                                    @include('components.input',[
                                                    'name'=>'name',
                                                    'id'=>'',
                                                    'label'=>'Name',
                                                    'placeholder'=>'',
                                                
                                                    ])  
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2" >
                                            <div class="col-md-12">
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                   

                                        <div class="row mb-2" >
                                            <div class="col-md-6" wire:ignore>
                                            @include('components.input',[
                                                'name'=>'email',
                                                'id'=>'',
                                                'label'=>'Email',
                                                'type'=>'email',
                                                'placeholder'=>'',
                                            
                                                ])  
                                                              
                                            </div>
                                            <div class="col-md-6" wire:ignore>
                                                 @include('components.input',[
                                                'name'=>'phone',
                                                'id'=>'',
                                                'label'=>'Phone',
                                                'placeholder'=>'eg: 0196456209, exclude country code',
                                            
                                                ])  
                                                    
                                            </div>                         
                                        </div>
                                        <div class="row mb-2" >
                                            <div class="col-md-6" >
                                                @error('email') <span class="error">{{ $message }}</span> @enderror                 
                                            </div>
                                            <div class="col-md-6">
                                               @error('phone') <span class="error">{{ $message }}</span> @enderror                
                                            </div>                         
                                        </div>

                                        <div class="row mb-2" >
                                            <div class="col-md-6" wire:ignore>
                                                    @include('components.select',[
                                                            'name'=>'street',
                                                            'selectid'=>'street',
                                                            'fieldname'=>'',
                                                            'id'=>'',
                                                            'label'=>'Street No.',
                                                            'placeholder'=>'', 
                                                            ])                    
                                            </div>
                                            <div class="col-md-6" wire:ignore>
                                                    @include('components.input',[
                                                        'name'=>'unit',
                                                        'id'=>'',
                                                        'label'=>'Unit',
                                                        'placeholder'=>'',
                                                    
                                                        ])                 
                                            </div>                         
                                        </div>
                                        <div class="row mb-2" >
                                            <div class="col-md-6" >
                                                @error('street') <span class="error">{{ $message }}</span> @enderror                 
                                            </div>
                                            <div class="col-md-6">
                                               @error('unit') <span class="error">{{ $message }}</span> @enderror                
                                            </div>                         
                                        </div>
                                    
                                        @if($fund==1)

                                        <div class="row mb-2" >
                                            <div class="col-md-6" wire:ignore>
                                            
                                            @include('components.input',[
                                                        'name'=>'contribution',
                                                        'id'=>'',
                                                        'label'=>'Contribution',
                                                        'placeholder'=>'',
                                                    
                                                        ])                  
                                            </div>
                                            <div class="col-md-6"  wire:ignore>

                                            @include('components.select',[
                                                            'name'=>'paymenttype',
                                                            'selectid'=>'paymenttype',
                                                            'fieldname'=>'',
                                                            'id'=>'',
                                                            'label'=>'Payment Type',
                                                            'placeholder'=>'', 
                                                            ])       
                                            </div>                         
                                        </div>

                                        <div class="row mb-2" >
                                            <div class="col-md-6" >
                                                @error('contribution') <span class="error">{{ $message }}</span> @enderror                 
                                            </div>
                                            <div class="col-md-6">
                                                @error('paymenttype') <span class="error">{{ $message }}</span> @enderror           
                                            </div>                         
                                        </div>


                                        @endif

                                        @if(!empty($form_user))
                                        
                                            <div class="card">
                                                <div class="card-body">
                                                <h5>{{$form_user}}</h5>
                                                @for($i=0;$i<$keyuser;$i++)

                                                    <div class="row">
                                                        
                                                        
                                                        <div class="mb-2 col-10">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model="membername.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-2">
                                                            <button wire:click="deleteuser()" type="button" class="btn btn-danger waves-effect waves-light mt-4">
                                                                <i class="mdi mdi-trash-can font-size-16 align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                 @endfor
                                                    <div class="row">
                                                            <div class="mb-2 col-10">
                                                            <button wire:click="adduser()" type="button" class="btn btn-success waves-effect waves-light mt-4">
                                                                   Add
                                                                </button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        @endif
                                    
                                        
                                        @if($paymenttype!=17)
                                        <div class="row mb-2">
         
                                          <div class="col-6" >
                                                
                                          @include('components.input',[
                                                                'name'=>'attachment',
                                                                'id'=>'',
                                                                'type'=>'file',
                                                                'label'=>'Payment Receipt',
                                                                'placeholder'=>'',
                                                        
                                                            ])  
                                                    
                                            </div>
                                        </div>
                                        <div class="row mb-2" >
                                            <div class="col-md-6" >
                                            @error('attachment') <span class="error">{{ $message }}</span> @enderror               
                                            </div>
                                            <div class="col-md-6">
                                                           
                                            </div>                         
                                        </div>
                                        @endif

                                        <div class="row mt-4" >
                                                <div class="col-4">
                                                        @include('components.button',[
                                                            'type'=>'submit',
                                                            'class'=>'btn btn-primary',
                                                            'onclick'=>'',
                                                            'label'=>'Submit',
                                                            'target'=>'register'
                                                        ])
                                                </div>
                                        </div>
      
                                    </form>
                                </div>
                            @else

                            <div class="row d-flex justify-content-center mb-2">
                                <div class="col-md-6">
                                    
                                        <div class="alert alert-success fade show px-3 mb-0" role="alert">
                                                       
        
                                                        <div>
                                                        
                                                            <p>Record successfully added.</p>
                                                             
                                                        </div>
                                        </div>

                                        <div class="alert alert-info fade show px-3 mt-4" role="alert">
                                                       
        
                                                       <div>
                                                           <h5 class="text-success"><span>Simfoni Perdana Portal</span></h5>
                                                           <p>We will be launching Simfoni Portal soon, wait for announcement via Whatsapp Group. Your account details will be send to you once system ready.</p>
                                                            
                                                       </div>
                                       </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ URL::asset('/assets/images/thankyou.png') }}" alt="">
                                </div>

                        </div>

                            @endif
                           

                            </div>
                        </div>
                    

                    </div>
                </div>
@if($type==0)
            </div>
        </div>
@endif
        <!-- end account-pages -->




@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>


$( document ).ready(function() {
    livewire.emit('load',0);
});
window.livewire.on('load', data => {
      
                    $('#street').select2({
                            placeholder: 'Select Street No',
                           
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


                    $('#paymenttype').select2({
                            placeholder: 'Select Payment Type',
                           
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/payment_type",
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

                    $('#paymenttype').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('paymenttype', dataval);        
                    });

                  
            
     
});
</script>
@include('components.toastr') 
@endpush
