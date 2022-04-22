@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
<div class="row">

       

        <div class="col-lg-12">
        @include('livewire.surau.menu')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">
                             <h4 class="card-title">Fund</h4> 
                            
                        </div>
                       
                        <div class="col-lg-10 d-flex justify-content-end">
                                
                               
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>

                                @can('add-fund')

                                    <div class="app-search">
                                        <div class="position-relative">
                            
                                        @can('add-fund')       
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.addfund','Add Fund','')\"",
                                                                'label'=>'Add Fund',
                                                                'icon'=>'',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                         @endcan
                                        </div>
                                    </div>

                                @endcan
                               
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    
                                    <th class="align-middle">Fund Name</th>
                                    <th class="align-middle">Description</th>
                                    @can('add-fund')
                                    <th class="align-middle">Total Contributor</th>
                                    <th class="align-middle">Total Target</th>
                                    <th class="align-middle">Total Collection</th>
                                    <th class="align-middle text-center">Expired Dated</th>           
                                    @else
                                    <th class="align-middle">Total Contribution</th>
                                    @endcan
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($funds as $fund)
                                <tr>
                                   
                                    <td class="text-truncate">
                                        {{$fund->name}}
                                    </td>
                                    <td class="text-truncate">
                                        {!! nl2br($fund->description) !!}
                                    </td>
                                    @can('add-fund')

                                    <td>
                                        {{ $fund->Contributor()->count() }}
                                    </td>
                                    <td>
                                        {{ $fund->target }}
                                    </td>
                                    <td>
                                    RM{!! number_format($fund->Contributor()->sum('contribution')) !!}    
                                    </td>
                                    <td>
                                       {{ Carbon\Carbon::parse($fund->expiry_date)->format('d, M Y') }}    
                                    </td>

                                    @else
                                    <td>    
                                           
                                     </td> 

                                    @endcan
                                                                   
                                    <td class="text-center">
                                 
                                    @can('add-fund')       
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.editfund','Edit Fund',$fund->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                    @endcan
                                    @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"onclick=\"window.location.href='contribution/".$fund->id."'\"",
                                                                'label'=>'Contribute',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                    </td>
                                
                                </tr>
                            @endforeach
        
                            </tbody>
                        </table>
                    </div>
               
                    <!-- end table-responsive -->
                </div>
            </div>
            <div class="row mt-10">
                        <div class="mt-10 ml-110">
                        {{ $funds->links() }}
                        </div>
            </div>
        </div>
    </div>
    @include('components.modal',['size'=>'lg'])  
</div>  
  
@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script>
    @if(!empty($toastrdata['message']))
   
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });

    
  
    @endif

            $(document).ready(function() {
                $("#appmodal").on("hidden.bs.modal", function() {
                //  $('#appmodal').empty();
                tinyMCE.activeEditor.setContent('');
                });
            });

            window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
                
            });

            window.livewire.on('cleardata', () => {
                $('#appmodal').empty();
            });

        window.livewire.on('modal', data => {

            
           
            $('#appmodal').modal('show'); 

          

                    tinymce.init({
                        selector: 'textarea#description',  // change this value according to your HTML
                        height : "300",
                        oninit : "setPlainText",
                        plugins : "paste",
                        forced_root_block : false,
                        menubar: '',
                        //init_instance_callback: "insert_contents",
                        content_style: "body {font-size: 10pt;}",
                        setup: function (editor) {
                                    editor.on('init change', function () {
                                        editor.save();
                                    });
                                    editor.on('change', function (e) {
                                    @this.set('description', editor.getContent());
                                    });
                                }
                    });

                    tinyMCE.activeEditor.setContent(data[2]['description']);

                    $('#enddate').datepicker({
                        todayHighlight: true,
                        format: 'dd M, yyyy',
                        }).on('changeDate', function(e){
                        $(this).datepicker('hide');
                        @this.set('enddate', $('#enddate').val());
                    });

                    $('#enddate').datepicker('setDate',data[2]['enddate']);  
        });
    </script>
@include('components.toastr')
@endpush