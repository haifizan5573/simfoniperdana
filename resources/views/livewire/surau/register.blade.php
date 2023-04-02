

@section('title')
    Registration Of Khairat Kematian
@endsection

@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


   

@section('title')
    @lang('translation.Login')
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

                                             
                                                    <div class="row mt-4">
                                    
                                                        <div class="col-12">
                                                            <button type="button" wire:click="togglebutton('buttintro')" class="btn @if($buttintro)btn-primary @else btn-outline-light  @endif  waves-effect ms-2">Pengenalan</button>
                                                            <button type="button" wire:click="togglebutton('buttbenefits')" class="btn @if($buttbenefits)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Manfaat</button>
                                                            <button type="button" wire:click="togglebutton('buttcond')" class="btn @if($buttcond)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Syarat-syarat</button>
                                                            <button type="button" wire:click="togglebutton('buttpayment')" class="btn @if($buttpayment)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Kaedah Bayaran</button>
                                                            <button type="button" wire:click="togglebutton('buttcontact')" class="btn @if($buttcontact)btn-primary @else btn-outline-light  @endif waves-effect ms-2">Hubungi Kami</button>
                                                        </div>
                                                    </div>

                                                    @if($buttintro)

                                                  
                                                            <div class="row p-2">
                                                                <div class="col-12">
                                                                <p >
                                                                Assalamualaikum wrt wbt<p>

                                                                <p class="mb-2">
                                                                Untuk Makluman pihak Musolla Simfoni Perdana membuka pendaftaran Khairat dan Kebajikan bagi tahun {{date('Y')}}, Sehubungan itu mohon para jamaah yang ingin mendaftar bolehlah mengisi google form di bawah. 
                                                                </p>

                                                                <p class="mb-0">
                                                                Objektif asal adalah untuk menggalakkan para  jemaah surau memberi infak/sumbangan secara tetap kepada surau demi manfaat dan kepentingan bersama atas semangat ukhwah dan persaudaraan islam serta menjadikan surau sebagai pusat kebajikan khusus penduduk islam

                                                                </p>
                                                                </div>
                                                            </div>  
                                               
                                                    @endif

                                                    @if($buttbenefits)

                                                    
                                                            <div class="row p-2">
                                                                <div class="col-12">

                                                                <p>Manfaat Ahli</p>
                                                                <p>
                                                                <ol>
                                                                <li>Jika berlaku kematian  pihak Musolla akan menguruskan segala urusan pengebumian termasuk (mandi. Kapan, solat, van jenazah dan sumbang berbentuk RM.</li>
                                                                <li>Sekiranya berlaku musibah kepada ahli pihak Surau akan memberi sumbangan yang sewajarnya kepada ahli</li>
                                                                <li>Setiap jemaah menyertai Tabung ini akan di daftarkan  sebagai anak kariah Musolla Simfoni Perdana secara automatik.</li>
                                                                </ol>
                                                                </p>
                                                                </div>
                                                            </div>  
                                                


                                                    @endif

                                                    @if($buttcond)
                                                   
                                                            <div class="row p-2" >
                                                                <div class="col-12">

                                                                    <p>
                                                                    Syarat-Syarat Pendaftaran Keahlian

                                                                    <ol>
                                                                    <li>Penduduk Simfoni Perdana (pemilik/penyewa).</li>
                                                                    <li>Beragama Islam.</li>
                                                                    </ol> 

                                                                    Yuran Ahli Setahun
                                                                    <ol>
                                                                    <li>Ahli Individu - RM50.</li>
                                                                    <li>Ahli suami isteri dan 5 orang anak - RM100.</li> 
                                                                    <li>Ahli suami isteri dan anak lebih 5 orang - RM150.</li>
                                                                    <li>Ahli Sekeluarga mempunyai adik beradik, ayah dan ibu tinggal sekali RM200.</li>
                                                                    </ol> 
                                                                    
                                                                    </p>

                                                                </div>
                                                            </div>  
                                                        </div>
                                                    
                                                    
                                                    @endif

                                                    
                                                    @if($buttpayment)

                                                    <div class="row p-2" >
                                                        <div class="col-12" >

                                                        <p>
                                                        Kaedah Pembayaran
                                                        </p>

                                                        <p class="mt-0">
                                                        Pembayaran boleh terus transfer ke akaun rasmi Musolla Simfoni Perdana :<br/>
                                                        BANK MUAMALAT MALAYSIA BERHAD<br/>
                                                        MUSOLLA SIMFONI PERDANA<br/>
                                                        NO AKAUN : 12140000377713</br>
                                                        REF : KHAIRAT<br/>
                                                        </p>
                                                        
                                                        </div>
                                                    </div>
                                                    @endif


                                                    @if($buttcontact)

                                                    <div class="row p-2">
                                                        <div class="col-12 " >
                                                        <p >
                                                        Sebarang Pertanyaan Sila Hubungi :<br/><br/>
                                                        {{-- Ustaz Ameer +60 12-620 0312 (Pengerusi)<br/>
                                                        Hj Razali +60 18-988 4497 (Timb Pengerusi)<br/>
                                                        Imam Azizi +60 11-2073 2121 (Imam)<br/>
                                                        Ustaz Naim +012-4785715 (Bendahari)<br/> --}}
                                                        </p>
                                                        </div>
                                                    </div>
                                                    @endif
                            
                                        </div>
                                    </div>
                            </div>

                            @if($show)
                            <div class="card-body pt-0">
                        
                                <div class="p-2">
                                    <form wire:submit.prevent="register" id="register">

                                        @if($type==0)
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
                                        @endif
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
                            @else

                            <div class="row d-flex justify-content-center mb-2">
                                <div class="col-md-6">
                                    
                                        <div class="alert alert-success fade show px-3 mb-0" role="alert">
                                                       
        
                                                        <div>
                                                            <h5 class="text-success">Pending Confirmation</h5>
                                                            <p>Thanks for being a part of us. Your submission is pending payment confirmation. We will send you the payment receipt shortly.</p>
                                                             
                                                        </div>
                                        </div>
                                        
                                        @if($public)
                                        <div class="alert alert-info fade show px-3 mt-4" role="alert">
                                                       <div>
                                                           <h5 class="text-success"><span>Simfoni Perdana Portal</span></h5>
                                                           <p>We will be launching Simfoni Portal soon, wait for announcement via Whatsapp Group. Your account details will be send to you once system ready.</p>
                                                            
                                                       </div>
                                       </div>
                                       @endif
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
