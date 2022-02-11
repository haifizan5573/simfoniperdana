@section('title')
Add New Loan Application
@endsection
@section('css')

<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
<div class="row">
        <div class="col-xl-12">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">New Application</h4>
                        <p class="card-title-desc"></p>
                        <form id="CustomerSearch" wire:submit.prevent="CustomerSearch">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                   
                                       @include('components.input',[
                                        'name'=>'icnumber',
                                        'id'=>'icnumber',
                                        'label'=>'IC No.',
                                        'placeholder'=>'',
                                        'wire'=>'wire:change="formatIC"  wire:keyup="formatIC"'
                                        ])   

                                        @error('icnumber') <span class="error">{{ $message }}</span>@enderror
                                             
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                 
                                    @include('components.input',[
                                        'name'=>'policeic',
                                        'id'=>'policeic',
                                        'label'=>'Police IC',
                                        'placeholder'=>'',
                                        ])   

                                             
                                    </div>
                                </div>
                            <div>
                                @if(!$showcustform)
                                    @include('components.button',[
                                        'type'=>'submit',
                                        'class'=>'btn btn-primary',
                                        'onclick'=>'',
                                        'label'=>'Search',
                                        'target'=>'CustomerSearch'
                                    ])
                                @endif
                              
                            </div>
                        </form>
                        @if($showcustform)
                        <form id="AddLoan" wire:submit.prevent="AddLoan">

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="mb-3">
                                    
                                        @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Name',
                                            'placeholder'=>'',
                                        
                                            ])   
                                        
                                        @error('name') <span class="error">{{ $message }}</span>@enderror

                                        @if(isset($labeltxt)) <span class="badge rounded-pill badge-soft-info">{{$labeltxt}}</span> @endif
                                                
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="mb-3">
                                    
                                        @include('components.select',[
                                            'name'=>'agent',
                                            'fieldname'=>'name',
                                            'id'=>'id',
                                            'label'=>'Agent',
                                            'placeholder'=>'-Select Agent-',
                                            'datas'=>App\Models\User::all(),
                                            'filtertype'=>'roles',
                                            'filter'=>'Agent'
                                        
                                            ])   
                                                
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-3">
                                            <div class="mb-3">
                                        
                                            @include('components.input',[
                                                'name'=>'phone',
                                                'id'=>'',
                                                'label'=>'Phone',
                                                'placeholder'=>'',
                                                'datas'=>App\Models\ProductGroup::all(),
                                                'fieldname'=>'name',
                                                'group'=>"product",
                                                ])   

                                         
                                        
                                                    
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="mb-3">
                                        
                                            @include('components.input',[
                                                'name'=>'email',
                                                'type'=>'email',
                                                'id'=>'',
                                                'label'=>'Email',
                                                'placeholder'=>'',
                                                ])   

                                                    
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="mb-3" wire:ignore >
                                        
                                            @include('components.select',[
                                            'name'=>'product',
                                            'selectid'=>'product',
                                            'fieldname'=>'name',
                                            'id'=>'id',
                                            'label'=>'Product',
                                            'placeholder'=>'-Select Product-',  
                                            ])   

                                           

                                                    
                                            </div>
                                    </div>
                            </div>

                            <div>
                               
                                    @include('components.button',[
                                        'type'=>'submit',
                                        'class'=>'btn btn-primary',
                                        'onclick'=>'',
                                        'label'=>'Add Application',
                                        'target'=>'AddLoan'
                                    ])
                                
                                    @include('components.button',[
                                        'type'=>'button',
                                        'class'=>'btn btn-warning',
                                        'onclick'=>'wire:click="cancelForm"',
                                        'label'=>'Cancel',
                                        'target'=>''
                                    ])
                              
                            </div>


                        </form>
                        @endif
                    </div>
                </div>
                        <!-- end card -->
        </div> <!-- end col -->
</div>
@push('scripts')

<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>
window.livewire.on('disabled', $data => {
    document.getElementById('icnumber').readOnly= true;
    document.getElementById('policeic').readOnly= true;
});

window.livewire.on('load', $data => {
 
    $('.select2').select2();

    $('#product').select2({
    placeholder: 'Select Product',
    tags: false, selectOnBlur: true,
    ajax: {
        url: "{{route('productlist')}}",
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
        return {
            results:  $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })
        };
        },
        //Allow manually entered text in drop down.
        // createSearchChoice:function(term, results) {
        //     if ($(results).filter( function() {
        //         return term.localeCompare(this.text)===0; 
        //     }).length===0) {
        //         return {id:term, text:term + ' [New]'};
        //     }
        // },
        // cache: true
    }
    });

   $('#product').on('change', function(e) {
    //getproduct();
    let data = $(this).val();
        @this.set('product', data);        
    });

});    

 


</script>
@endpush