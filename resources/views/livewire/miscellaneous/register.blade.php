

@section('title')
    Registration
@endsection

@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


   

@section('title')
    @lang('translation.Login')
@endsection


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

                <div class="row justify-content-center">

                
                    <div class="col-md-9">
                        <div class="card overflow-hidden">
                            <div >
                                <div class="row">
                                  
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                
                                                <h5 class="text-primary">Simfoni Perdana Portal - Registration</h5>
                                                <hr/>
                                                <p>Hi Simfonians!, Welcome to Simfoni Perdana registration page. This is not a <u>replacement</u> of our current KipleCity, this portal aim to serve as community and communication platform. The platform development still ongoing (still buggy) and here some expected features coming soon;<br/>
                                                  
                                                   <ol>
                                                        <li>Surau Management - Work In Progress</li>
                                                        <li>Simfoni Marketplace - Not Started Yet</li>
                                                        <li>Disussion Board - Not Started Yet</li>
                                                        <li>JMB/Commitee Management (Voting) - Not Started Yet</li>
                                                    </ol>
                                                </p>
                                                <p>Please note that, this is my own initiative with support from Surau Committee and JMB. This portal is totally free as it is and maybe some freemium features will be implemented in the future. </p>  
                                                <p>Here my personal details;
                                                <table class="table table-nowrap mb-0" style="width: 70%">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>Mohd Haifizan Mohd Raya</td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>
                                                           0193632309
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>haifizan@gmail.com</td>
                                                    </tr>
                                                
                                                 
                                                </tbody>
                                            </table>

                                            <p class="mt-2">Feel free to share your thoughts and ideas. Adios</p>
                          
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
                                                        'placeholder'=>'eg: 47B',
                                                    
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
                            @else

                            <div class="row d-flex justify-content-center mb-4">
                                <div class="col-md-6">
                                    
                                        
                                        
                                        @if($public)
                                        <div class="alert alert-info fade show px-3 mt-4" role="alert">
                                                       <div>
                                                           <h5 class="text-success"><span>Simfoni Perdana Portal</span></h5>
                                                           <p>Please check your email for login details.</p>
                                                            
                                                       </div>
                                       </div>
                                       @endif
                                </div>
                                <div class="col-md-3">
                                <img src="{{ URL::asset('/assets/images/register.png') }}" alt="">
                                </div>

                        </div>
                        
                            @endif
                           

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
@include('components.toastr') 
@endpush
