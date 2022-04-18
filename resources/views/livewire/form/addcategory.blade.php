<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="addcategory" wire:submit.prevent="addcategory">
                   

                    

                 
                    <div class="row mb-2 mt-2">
                          
                          <div class="col-6" >
                              
                          @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Category Name',
                                            'placeholder'=>'',
                                        
                                            ])  
                            @error('name') <span class="error">{{ $message }}</span> @enderror

                           </div>
                           
                      </div>

                     

                      <div class="row">
                            <div class="col-12">
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit Changes',
                                   'target'=>'addcategory'
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
            </form>
                     
                                      
        </div>
</div>
