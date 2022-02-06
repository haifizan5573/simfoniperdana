<div class="row">

<div class="row mb-2">
    <div class="col-md-12 d-flex text-center">
         <h4 class="card-title mt-4">New Application</h4>
    </div>
</div>

            <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('message'))
                                <div class="alert alert-info mb-0" role="alert">
                                {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
 
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    
                
                    <form wire:submit.prevent="addloan" id="addloan">
                   
                    <div class="row">
                         <div class="col-md-4">
                         <h5 class="card-title">Personal Info</h5>
                            <div class="row mb-2">
                                <div class=" col-md-12">
                                   
                                    
                                    <input type="text" class="form-control red" id="floatingnameInput" placeholder="Name"
                                        value="" wire:model.defer="name">

                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                 
                                </div>
                            </div>
                            
                                <div class="row mb-2">
                                    <div class="col-md-6" >
                                        <input type="text"  class="form-control" placeholder="NRIC"
                                            wire:model="icnumber">
                                    
                                        @error('icnumber') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="floatingnameInput" placeholder="Police No"
                                            value="" wire:model.defer="policeic">
                                    
                                        @error('policeic') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            
                            <div class="row mb-2">
                                <div class="col-md-6">       
                                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Phone"
                                        value="" wire:model.defer="phone">
                                    
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror      
                                </div>
                                <div class="col-md-6">
                                
                                <input type="text" class="form-control" id="floatingnameInput" placeholder="Email"
                                    value="" wire:model.defer="email">
                                
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                           
                                </div>

                            </div>
                              
                            <div class="row mb-2">
                                   <h6>Location</h6>
                                   <textarea class="form-control" rows="5" cols="10" wire:model="location" ></textarea>
                             
                            </div>
                            <!-- <div class="row mb-2">                                           
                             
                                <div class="mb-3 col-lg-3"> 
                                    <input type="text" placeholder="Postcode"  wire:model="postcode"   class="form-control">
                                    @error('postcode') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 col-lg-9">  
                                  
                                    @if(isset($postdata)&&$postdata->count()>0)
                                       
                                    <select class="form-control" wire:model.defer="location">
                                       <option value="">-Select Location-</option>                       
                                       @foreach($postdata as $loc)
                                          <option value="{{$loc->id}}">{{ $loc->location }}</option>
                                       @endforeach    
                                    </select>     

                                    @else             
                                    <input type="text" placeholder="Location" readonly wire:model.lazy="locationtmp"  class="form-control">  
                                    @endif
                                    @error('location') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div> -->

                            <h6>Attachment - Latest Payslip</h6>
                            <div class="row">
                                <div class="col-12 mb-2">
                  
                                                <div class="input-group">                                                  
                                                    <input type="text" wire:model.defer="paysliptitle" class="form-control"  placeholder="Salary Slip Attach Month of:">
                                                </div>
                                                @error('paysliptitle') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                  
                                                <div class="input-group">
                                                   
                                                    <input type="file" wire:model="payslip" class="form-control"  placeholder="Latest Payslip">
                                                </div>
                                                @error('payslip') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            
                                    

                            <div class="row mb-2">
                                <div class="col-md-6">
                                 
                                    <input type="text" class="form-control" placeholder="Position"
                                        value="" wire:model.defer="position">
                                      
                                        @error('position') <span class="error">{{ $message }}</span> @enderror
                                    
                                </div>
                                <div class="col-md-6">
                                    <select wire:model.defer="employmentstatus" class="form-select">
                                                                <option >Employment Status</option>        
                                                                <option value="Permanent">Permanent</option>
                                                                <option value="Contract">Contract</option>
                                                                <option value="Temporary">Temporary</option>
                        
                                    </select>
                                        
                                        @error('employmentstatus') <span class="error">{{ $message }}</span> @enderror
                                  
                                </div>
                            </div>
                            <div class="row mb-4" wire:ignore>

                                <div class="col-md-6">
                                
                                    <input type="date" class="form-control input-mask"  placeholder="Employment Date"
                                         wire:model.defer="employmentdate">
                            
                                     @error('employmentdate') <span class="error">{{ $message }}</span> @enderror

                                     
                                </div>
                                

                            </div>

                          
                      


                         </div> 
                         <div class="col-md-4">

                            <div class="row mb-2" wire:ignore>
                                <div class="col-md-12">
                                <h6>Remark</h6>
                                <hr/>
                                    <textarea id="elm1" wire:model="remark" ></textarea>
                                </div>
                            </div>   
                      
                                        
                          </div>

                         </div>

                    </div>
                  
                   
                    

                   
                </div>

                <div class="row mb-2 ml-5">
                    <div class="col-md-12">
                            <button type="submit" onclick="openConfirmationBox()|| event.preventDefault();" class="btn btn-primary">
                        

                            <span wire:loading wire:target="addloan">

                                        <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
                            </span>
                            <span>Submit</span>

                            </button>
     
                           
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="addloan" >
                            Please wait
        </div>
        </form>
        
</div>

 
@section('scripts')
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>                     
   <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <!-- end row -->
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script>

window.livewire.on('errorModal', () => {
            $('#errorModal').modal('show');
 });

function enableButton(){

    $('#btnYes').prop('disabled',false);

}
function openConfirmationBox(){


    $('#myModal').modal('show');
   // $('#btnYes').prop('disabled','');
    window.livewire.emit('modalscroll');

}

$('#btnYes').click(function() {
  
    $('#myModal').modal('hide');
    $("#addloan")[0].dispatchEvent(new Event('submit')); 

});




tinymce.init({
  selector: 'textarea#elm1',  // change this value according to your HTML
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


//


$('div.alert').delay(3000).slideUp(300);




</script>
@endsection