



<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="editloandetails" wire:submit.prevent="editloandetails">
                        <div class="row mb-2" wire:ignore>
                          
                            <div class="col-6">

                            @include('components.select',[
                                            'name'=>'agentid',
                                            'selectid'=>'agentid',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Agent',
                                            'placeholder'=>'', 
                                            ])  
                                
                            </div>

                            <div class="col-6" wire:ignore>
                           
                                @include('components.select',[
                                            'name'=>'appstatus',
                                            'selectid'=>'appstatus',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Status',
                                            'placeholder'=>'', 
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
                                   'target'=>'editloandetails'
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
