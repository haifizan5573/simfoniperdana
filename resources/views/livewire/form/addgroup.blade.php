<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="attachtogroup" wire:submit.prevent="attachtogroup">
                   

                    

                        <div class="row">
                         <div class="col-md-6 fw-bold mb-2">
                            User List
                         </div>
                      </div>
                      <div class="row" wire:ignore>
                         <div class="col-md-6" id="userlist">

                         </div>
                      </div>
                      <hr/>
                      <div class="row mb-2 mt-2">
                          
                          <div class="col-6" wire:ignore>
                              
                                 @include('components.select',[
                                            'name'=>'group',
                                            'selectid'=>'group',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Group Name',
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
                                   'target'=>'attachtogroup'
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
