<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="editactivitysurau" id="form">
                    <h5 class="card-title">Edit Surau Activity - {{$name}}</h5>
                

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
                                    'content'=>'test',
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
                            <div class="col-md-6" wire:ignore>

    

                                     @include('components.select',[
                                            'name'=>'category',
                                            'selectid'=>'category',
                                            'fieldname'=>'',
                                            'id'=>'',
                                            'label'=>'Category',
                                            'placeholder'=>'', 
                                            ])     
                                    
                                        
                            </div>
                            <div class="col-md-6" wire:ignore>


                                @include('components.select',[
                                    'name'=>'status',
                                    'selectid'=>'status',
                                    'fieldname'=>'',
                                    'id'=>'',
                                    'label'=>'Status',
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
                                   'onclick'=>'data-bs-dismiss="modal"',
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