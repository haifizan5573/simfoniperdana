<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="addfund" id="form">
        
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
                                               'name'=>'enddate',
                                               'id'=>'',
                                               'label'=>'End Date',
                                             
                                               'placeholder'=>'',
                                           
                                               ])  
                                @error('enddate') <span class="error">{{ $message }}</span> @enderror
                                   
                               </div>
                              
                                <div class="col-md-6 mb-2">
                                
                                @include('components.input',[
                                                    'name'=>'fixamount',
                                                    'id'=>'',
                                                    'label'=>'Fix Amount <small>leave empty to allow user insert any amount</small>',
                                                    'placeholder'=>'',
                                                
                                                    ])  
                                @error('fixamount') <span class="error">{{ $message }}</span> @enderror
                                 </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-2">
                                
                                @include('components.input',[
                                                    'name'=>'target',
                                                    'id'=>'',
                                                    'label'=>'Target Amount <small>set fund target</small>',
                                                    'placeholder'=>'',
                                                
                                                    ])  
                            
                                 </div>

                        </div>

                        <div class="row">
            
                            <div class="mt-2">
                            
                                        @include('components.button',[
                                            'type'=>'submit',
                                            'class'=>'btn btn-primary',
                                            'onclick'=>'',
                                            'label'=>'Submit',
                                            'target'=>'addfund'
                                        ])
                                    
                                        @include('components.button',[
                                            'type'=>'button',
                                            'class'=>'btn btn-warning',
                                            'onclick'=>'data-bs-dismiss="modal"',
                                            'label'=>'Cancel',
                                            'target'=>''
                                        ])
                            
                            </div>
                        </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            </form>
        </div>

</div>