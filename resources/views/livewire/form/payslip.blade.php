


<div class="row mb-0">
        <div class="col-12 card shadow-none card-body">
            <form id="editpayslip" class="repeater" wire:submit.prevent="editpayslip">
                        <div class="row mb-2">
                          
                            <div class="col-6">

                            @include('components.input',[
                                            'name'=>'basicincome',
                                            'id'=>'',
                                            'label'=>'Basic Income',
                                            'placeholder'=>'',
                                    
                                          ])  
                                
                            </div>

                            <div class="col-6" >
                           
                              
                           
                             </div>
  
                        </div>
                        <div class="row mt-2">
                        
                                    <div class="col-6">
                                            <h6>Income</h6>
                                            <hr/>
                                            @for($i=0;$i<$keyincome;$i++)

                                                    <div class="row">
                                                        
                                                            <div class="mb-2 col-6">
                                                            
                                                            <label class="form-label">Label</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model.lazy="labelincome.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-4">
                                                            <label class="form-label">Amount</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model="amountincome.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-2">
                                                            <button wire:click="deleteincome()" type="button" class="btn btn-danger waves-effect waves-light mt-4">
                                                                <i class="mdi mdi-trash-can font-size-16 align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                            @endfor
                                            <div class="row" wire:ignore>
                                                <div class="col-3">
                                                <input wire:click="addincome()" type="button" class="btn btn-success" value="Add Income">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-6">

                                            <h6>Deduction</h6>
                                            <hr/>
                                            @for($i=0;$i<$keydeduction;$i++)

                                                    <div class="row">
                                                        
                                                            <div class="mb-2 col-lg-6">
                                                            
                                                            <label class="form-label">Label</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model="labeldeduction.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-lg-4">
                                                            <label class="form-label">Amount</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model="amountdeduction.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-lg-2">
                                                            <button wire:click="deletededuction()" type="button" class="btn btn-danger waves-effect waves-light mt-4">
                                                                <i class="mdi mdi-trash-can font-size-16 align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                            @endfor
                                            <div class="row" >
                                                <div class="col-5">
                                                  
                                                    <button type="button" wire:click="adddeduction()" class="btn btn-success">
                                                        Add Deduction
                                                    </button>
                                                </div>
                                            </div>
                                    </div>    
                      </div>
                     
                      <hr/>
                      <div class="row">
                            <div class="col-12">
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit Changes',
                                   'target'=>'editpayslip'
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