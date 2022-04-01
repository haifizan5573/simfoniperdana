

@section('title')
    Registration Of Khairat Kematian
@endsection

@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('body')

    <body class="auth-body-bg" style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; ">
    @endsection

   

@section('title')
    @lang('translation.Login')
@endsection

@section('body')

    <body>
    @endsection

   
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
            <div class="row d-flex justify-content-center mb-2">
                     <div class="col-md-3">
                        <!-- <img src="{{ URL::asset('/assets/images/SimfoniPerdanaTransparent.png') }}" alt=""
                                            width="200"> -->
                     </div>

            </div>
                <div class="row justify-content-center">

                
                    <div class="col-md-8">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Application for mutual benevolent (Khairat Kematian)</h5>
                                            
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <!-- <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""
                                            class="img-fluid"> -->
                                    </div>
                                </div>
                            </div>
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
                                                'placeholder'=>'',
                                            
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
                                        <div class="row mb-2" >
                                            <div class="col-md-6" wire:ignore>
                                                    @include('components.select',[
                                                            'name'=>'membership',
                                                            'selectid'=>'membership',
                                                            'fieldname'=>'',
                                                            'id'=>'',
                                                            'label'=>'Membership Type',
                                                            'placeholder'=>'', 
                                                            ])                    
                                            </div>
                                            <div class="col-md-6" >
                                            @if(!empty($totalPayment))

                                                @include('components.input',[
                                                'name'=>'totalPayment',
                                                'id'=>'',
                                                'label'=>'Total Fees',
                                                'placeholder'=>'',
                                                'inputlock'=>true
                                                ])  

                                            @endif         
                                            </div>                         
                                        </div>
                                        <div class="row mb-2" >
                                            <div class="col-md-6" >
                                                @error('membership') <span class="error">{{ $message }}</span> @enderror                 
                                            </div>
                                            <div class="col-md-6">
                                                           
                                            </div>                         
                                        </div>

                                        <div class="row mb-2">
                          
                                            <div class="col-6" wire:ignore>
                                                
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
                                     

                                        <div class="row mt-4">
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

                           

                            </div>
                        </div>
                    

                    </div>
                </div>
            </div>
        </div>
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


                    $('#membership').select2({
                            placeholder: 'Select Membership Type',
                           
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/surau_khairat_membership",
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

                    $('#membership').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('membership', dataval);        
                    });

                  
            
     
});
</script>

@endpush
