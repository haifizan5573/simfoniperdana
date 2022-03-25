



<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="editemployer" wire:submit.prevent="editemployer">
                        <div class="row mb-2">
                          
                            <div class="col-6">

                        
                                
                                    @include('components.input',[
                                            'name'=>'jobtitle',
                                            'id'=>'',
                                            'label'=>'Job Title',
                                            'placeholder'=>'',
                                        
                                            ])   
                            </div>

                            <div class="col-6" wire:ignore>
                           
                                @include('components.select',[
                                            'name'=>'employer',
                                            'selectid'=>'employer',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Employer Name',
                                            'placeholder'=>'', 
                                            ])  
                              
                           
                             </div>
  
                        </div>

                    <div class="row mb-2">
                          
                          <div class="col-6">
                              
                                 @include('components.datepicker',[
                                          'name'=>'datejoined',
                                          'id'=>'',
                                          'label'=>'Date Joined',
                                          'placeholder'=>'Select Date Joined',
                                          'date'=>''
                                      
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
                                   'target'=>'editemployer'
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
