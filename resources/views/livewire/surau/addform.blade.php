 

@section('css')


<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


<div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="addactivitysurau">
                    <h5 class="card-title">Add Form</h5>
                

                        <div class="row">
                           <div class="col-md-12 mb-2">
                           
                           @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Name',
                                            'placeholder'=>'',
                                        
                                            ])  
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row" wire:ignore>
                           <div class="col-md-12 mb-2">
                                @include('components.textarea',[
                                    'element'=>'description',
                                    'name'=>'description',
                                    'content'=>'',
                                    'label'=>'Description',
                                ])  
                            </div>
                        </div>
                    
                        <div class="row">
                             <div class="col mb-2">
                               
                               @include('components.datepicker',[
                                               'name'=>'startdate',
                                               'id'=>'',
                                               'label'=>'Start Date',
                                             
                                               'placeholder'=>'',
                                           
                                               ])  
                                @error('startdate') <span class="error">{{ $message }}</span> @enderror
                                   
                               </div>
                              <div class="col mb-2">
                               
                            @include('components.timepicker',[
                                            'name'=>'starttime',
                                            'id'=>'starttime',
                                            'label'=>'Time',
                                          
                                            'placeholder'=>'',
                                        
                                            ])  
                                  
                            </div>
                        </div>

                        <div class="row">
                             <div class="col mb-2">
                               
                               @include('components.datepicker',[
                                               'name'=>'enddate',
                                               'id'=>'',
                                               'label'=>'End Date',
                                             
                                               'placeholder'=>'',
                                           
                                               ])  
                                       @error('enddate') <span class="error">{{ $message }}</span> @enderror
                                   
                               </div>
                              <div class="col mb-2">
                               
                            @include('components.timepicker',[
                                            'name'=>'endtime',
                                            'id'=>'endtime',
                                            'label'=>'Time',
                                          
                                            'placeholder'=>'',
                                        
                                            ])  
                              
                                
                            </div>
                        </div>
                 
                    
                        <div class="row" >
                            <div class="col-md-12" wire:ignore>

    

                                     @include('components.select',[
                                            'name'=>'category',
                                            'selectid'=>'category',
                                            'fieldname'=>'',
                                            'id'=>'',
                                            'label'=>'Category',
                                            'placeholder'=>'', 
                                            ])     
                                    
                                        
                            </div>
                            @error('category') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    
             
                 <div class="mt-2">
                 
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit',
                                   'target'=>'addactivitysurau'
                               ])
                           
                               @include('components.button',[
                                   'type'=>'button',
                                   'class'=>'btn btn-warning',
                                   'onclick'=>"onclick='window.location.href=\"activities\"'",
                                   'label'=>'Cancel',
                                   'target'=>''
                               ])
                 
                 </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            </form>
        </div>

</div>
    <!-- end row -->


@push('scripts')


<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script>


$( document ).ready(function() {
    livewire.emit('load',0);
});
window.livewire.on('load', data => {

                tinymce.init({
                selector: 'textarea#description',  // change this value according to your HTML
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
                            @this.set('description', editor.getContent());
                            });
                        }
                });
        
    
                    $('#category').select2({
                            placeholder: 'Select Category',
                            //width: '250px',
                       
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/category_surau",
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

                    $('#category').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('category', dataval);        
                    });

                    $('#startdate').datepicker({
                        todayHighlight: true,
                        format: 'dd M, yyyy',
                        }).on('changeDate', function(e){
                        $(this).datepicker('hide');
                        @this.set('startdate', $('#startdate').val());
                    });

                

                    $('#enddate').datepicker({
                        todayHighlight: true,
                        format: 'dd M, yyyy',
                        }).on('changeDate', function(e){
                        $(this).datepicker('hide');
                        @this.set('enddate', $('#enddate').val());
                    });

                  

                    $('#starttime').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('starttime', data);        
                    });

                    $('#endtime').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('endtime', data);        
                    });




     
});




</script>
@include('components.toastr') 
@endpush

