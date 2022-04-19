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
                             <h4 class="card-title">Activities</h4> 
                            
                        </div>
                       
                        <div class="col-lg-10 d-flex justify-content-end">
                                
                               
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>

                                @can('add-activities')

                                    <div class="app-search">
                                        <div class="position-relative">
                                        <button type="button" onclick="window.location.href='{{ route('addactivitysurau')}}'" class="btn btn-primary waves-effect waves-light pb5">Add Activity</button>
                                        </div>
                                    </div>

                                @endcan
                               
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                  
                                    <th class="align-middle">Act. Name</th>
                                    <th class="align-middle">Description</th>
                                    <th class="align-middle">Start Date</th>
                                    <th class="align-middle text-center">End Date</th>
                                    <th class="align-middle text-center">Category</th>
                                    <th class="align-middle text-center">Status</th>
                                    @can('add-activities')
                                    <th class="align-middle text-center">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($activities as $activity)
                                <tr>
                                   
                                    <td>
                                        {{$activity->name}}
                                    </td>
                                    <td class="text-truncate">
                                        {!! nl2br($activity->description) !!}
                                    </td>
                                    <td>
                                
                                        {{ Carbon\Carbon::parse($activity->start_date)->format('d, M Y') }}                    
                                    </td>                                  
                                    <td class="text-center">
                                       
                                        @if(!empty($activity->end_date))
                                        {{ Carbon\Carbon::parse($activity->end_date)->format('d, M Y') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                      
                                        {{$activity->Category()->first()->name}}
                                  
                                    </td>
                                    <td class="text-center">
                                    @if(date('Y-m-d')>Carbon\Carbon::parse($activity->start_date)->format('Y-m-d'))
                                     <span class="badge badge-pill badge-soft-danger font-size-11">Past</span>
                                     @else
                                    <span class="badge badge-pill {{ ($activity->status==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11"> {!! nl2br($activity->Label()->first()->name) !!}</span>
                                    @endif

                                    </td>
                                    @can('add-activities')
                                    <td class="text-center">

                                        
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.editsurauactivity','Edit Activity',$activity->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                            
                                    </td>
                                    @endcan
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
                        {{ $activities->links() }}
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

                // function insert_contents(inst){
                //     inst.setContent(data[2]['description']);  
                // }
        
    
                    $('#category').select2({
                            placeholder: data[2]['category'],
                            width: '300px',
                       
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/category_surau",
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
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#category').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('category', dataval);        
                    });

                    $('#status').select2({
                            placeholder: data[2]['status'],
                            width: '300px',
                       
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('label')}}/status",
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
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#status').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('status', dataval);        
                    });

                    $('#startdate').datepicker({
                        todayHighlight: true,
                        format: 'dd M, yyyy',
                        }).on('changeDate', function(e){
                        $(this).datepicker('hide');
                        @this.set('startdate', $('#startdate').val());
                    });

                    $('#startdate').datepicker('setDate',data[2]['startdate']);

                    $('#enddate').datepicker({
                        todayHighlight: true,
                        format: 'dd M, yyyy',
                        }).on('changeDate', function(e){
                        $(this).datepicker('hide');
                        @this.set('enddate', $('#enddate').val());
                    });

                    $('#enddate').datepicker('setDate',data[2]['enddate']);
                   
                    $('#starttime').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('starttime', data);        
                    });

                    $('#endtime').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('endtime', data);        
                    });

                   

               
        });
    </script>
@include('components.toastr')
@endpush