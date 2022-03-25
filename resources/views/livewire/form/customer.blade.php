



<div class="row mb-0">
        <div class="col-12 card border shadow-none card-body">
            <form id="editcustomer" wire:submit.prevent="editcustomer">
                        <div class="row mb-2">
                          
                            <div class="col-6">

                        
                                
                                    @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Name',
                                            'placeholder'=>'',
                                        
                                            ])   
                            </div>

                            <div class="col-6">
                                
                                @include('components.input',[
                                        'name'=>'icnumber',
                                        'id'=>'',
                                        'label'=>'IC No.',
                                        'placeholder'=>'',
                                        'wire'=>'wire:change="formatIC"  wire:keyup="formatIC"'
                                        ])   
                             </div>
  
                        </div>

                    <div class="row mb-2">
                          
                          <div class="col-6">
                              
                                  @include('components.input',[
                                          'name'=>'phone',
                                          'id'=>'',
                                          'label'=>'Phone',
                                          'placeholder'=>'',
                                      
                                          ])   
                          </div>

                          <div class="col-6">
                              
                                 @include('components.input',[
                                          'name'=>'email',
                                          'id'=>'',
                                          'label'=>'Email',
                                          'placeholder'=>'',
                                      
                                          ])   
                             
                           </div>

                      </div>

                      <div class="row mb-2">
                          
                          <div class="col-12">
                              
                                  @include('components.textarea',[
                                          'name'=>'fulladdress',
                                          'id'=>'',
                                          'element'=>"fulladdress",
                                          'label'=>'Address',
                                          'placeholder'=>'',
                                      
                                          ])   
                          </div>

                      </div>

                      <div class="row mb-4" wire:ignore>
                          
                          <div class="col-4" >

                          @include('components.select',[
                                            'name'=>'postcode',
                                            'selectid'=>'postcode',
                                            'fieldname'=>'',
                                            'id'=>'',                         
                                            'label'=>'Postcode',
                                            'placeholder'=>'', 
                                            ])  
                              
                             
                          </div>

                          <div class="col-8">
                              
                             @include('components.select',[
                                            'name'=>'location',
                                            'selectid'=>'location',
                                            'fieldname'=>'',
                                            'id'=>'',
                                            'label'=>'Location',
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
                                   'target'=>'editcustomer'
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
