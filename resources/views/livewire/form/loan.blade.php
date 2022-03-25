



<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="editloan" wire:submit.prevent="editloan">
                        <div class="row mb-2" wire:ignore>
                          
                            <div class="col-6">

                            @include('components.select',[
                                            'name'=>'productgroup',
                                            'selectid'=>'productgroup',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Product Group',
                                            'placeholder'=>'', 
                                            ])  
                                
                            </div>

                            <div class="col-6" wire:ignore>
                           
                                @include('components.select',[
                                            'name'=>'productname',
                                            'selectid'=>'productname',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Product Name',
                                            'placeholder'=>'', 
                                            ])  
                              
                           
                             </div>
  
                        </div>
                        <div class="row mb-2">
                          
                          <div class="col-6">

                          @include('components.input',[
                                            'name'=>'amountapplied',
                                            'id'=>'',
                                            'label'=>'Amount Applied',
                                            'placeholder'=>'',
                                    
                                          ])  
                              
                          </div>

                          <div class="col-6" wire:ignore>
                         
                          @include('components.input',[
                                            'name'=>'amountapproved',
                                            'id'=>'',
                                            'label'=>'Amount Approved',
                                            'placeholder'=>'',
                                          ])  

                           </div>

                      </div>

                    <div class="row mb-2">
                          
                          <div class="col-6">
                              
                                 @include('components.datepicker',[
                                          'name'=>'datesubmitted',
                                          'id'=>'',
                                          'label'=>'Date Submitted',
                                          'placeholder'=>'Select Date Submitted',
                                          'date'=>''
                                      
                                          ])   
                             
                           </div>
                           <div class="col-6">
                              
                              @include('components.datepicker',[
                                       'name'=>'dateapproved',
                                       'id'=>'',
                                       'label'=>'Date Approved',
                                       'placeholder'=>'Select Date Approved',
                                       'date'=>''
                                   
                                       ])   
                          
                             </div>

                      </div>

                      <div class="row mb-2">
                          
                          <div class="col-6" wire:ignore>
                              
                                 @include('components.select',[
                                            'name'=>'tenureapplied',
                                            'selectid'=>'tenureapplied',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Tenure Applied',
                                            'placeholder'=>''
                                            ])  
                           </div>
                           <div class="col-6" wire:ignore>
                              
                                 @include('components.select',[
                                            'name'=>'tenureapproved',
                                            'selectid'=>'tenureapproved',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Tenure Approved',
                                            'placeholder'=>'', 
                                            ])  
                          
                             </div>

                      </div>

                      <div class="row mb-2">
                          
                          <div class="col-6">
                              
                                 @include('components.datepicker',[
                                          'name'=>'datedisbursed',
                                          'id'=>'',
                                          'label'=>'Date Disbursed',
                                          'placeholder'=>'Select Date Disbursed',
                                          'date'=>''
                                      
                                          ])   
                             
                           </div>
                           <div class="col-6">
                              
                              @include('components.datepicker',[
                                       'name'=>'daterejected',
                                       'id'=>'',
                                       'label'=>'Date Rejected',
                                       'placeholder'=>'Select Date Rejected',
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
                                   'target'=>'editloan'
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
