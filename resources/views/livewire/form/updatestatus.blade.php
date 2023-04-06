<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="editstatus" wire:submit.prevent="editstatus">


                      <div class="row mb-4">
                          
                          <div class="col-6" wire:ignore>
                             
                          @include('components.input',[
                                            'name'=>'id',
                                            'id'=>'',
                                            'label'=>'',
                                            'placeholder'=>'',
                                            'type'=>'hidden'
                                        
                                            ]) 
                                 @include('components.select',[
                                            'name'=>'status',
                                            'selectid'=>'status',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Status',
                                            'placeholder'=>''
                                            ])  
                           </div>
                          
                      </div>

                     

                      <div class="row">
                            <div class="col-12">
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit Changes',
                                   'target'=>'editstatus'
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
