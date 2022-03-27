<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="payslipattachment" wire:submit.prevent="payslipattachment">
                      <div class="row mb-2">
                          
                          <div class="col-6" wire:ignore>
                              
                                @include('components.input',[
                                            'name'=>'payslipattachment',
                                            'id'=>'',
                                            'type'=>'file',
                                            'label'=>'Payslip',
                                            'placeholder'=>'',
                                    
                                          ])  
                                @error('payslipattachment') <span class="error">{{ $message }}</span> @enderror
                           </div>
                          

                      </div>

                     

                      <div class="row">
                            <div class="col-12">
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Attach Payslip',
                                   'target'=>'payslipattachment'
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
