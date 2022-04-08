@section('css')
<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                             <h4 class="card-title mt-4">Forms</h4> 
                            
                        </div>
                       
                        <div class="col-lg-8 d-flex justify-content-end">
                             
                    
                               
                                <div class="app-search m-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                             
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                   
                                    <th class="align-middle">Title</th>
                                    @can('update-khairat')
                                    <th class="align-middle">No. Of Submission</th>
                                  
                                    <th class="align-middle">Contribution</th>
                                    @endcan
                                
                                    <th class="align-middle text-center">Start Date</th>
                                    <th class="align-middle text-center">End Date</th>
                                    <th class="align-middle text-center">Status</th>
                                    @can('update-khairat')
                                    <th class="align-middle text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($forms as $form)
                                <tr>
                                 
                                    <td>{{$form->title}}</td>

                                    @can('update-khairat')
                                    <td class="text-center">

                                     <a href="{{ route('formuser',['formid'=>$form->id])}}">{{$form->formuser()->count()}}</a>

                                    </td>
                                    <td class="text-center">
                                     @if(!empty($form->formuser()->sum('contribution')))
                                        RM{{$form->formuser()->sum('contribution')}}
                                     @endif
                                    </td>      
                                    @endcan                            
                                   
                                    <td class="text-center">
                                    @if(!empty($form->start_date))
                                    {!! $formatter->formatDate2($form->start_date) !!}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                      
                                    @if(!empty($form->end_date))
                                    {!! $formatter->formatDate2($form->end_date) !!}
                                          @endif
                                  
                                    </td>
                                    <td class="text-center">

                                    <span class="badge badge-pill {{ ($form->status==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11"> {!! nl2br($form->Label()->first()->name) !!}</span>

                                    </td>
                                   
                                    <td class="text-center">

                                        @can('update-khairat')
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.updatestatus','Edit - Update Status',$form->id)\"",
                                                                'label'=>'Edit',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                        @endif
                                        
                                        @if($form->status==1)
                                        
                                            @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"onclick=\"window.location.href=('".route('form',['id'=>$form->id])."')\"",
                                                                'label'=>'Register',
                                                                'icon'=>'<i class="bx bx-pencil font-size-16 align-middle me-2"></i>',
                                                                'loader'=>true,
                                                                'targetloader'=>"",
                                            ])

                                        @endif
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
                        {{ $forms->links() }}
                        </div>
            </div>
        </div>
    </div>
    @include('components.modal',['size'=>'lg'])  
</div>  
  
@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>
    @if(!empty($toastrdata['message']))
   
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });

    
  
    @endif

        window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
            });

        window.livewire.on('modal', data => {

                $('#appmodal').modal('show'); 

                $(window).on('shown.bs.modal', function(e) { 
                    e.preventDefault();
                });

                if(data[0]=="livewire.form.updatestatus"){

                        $('#status').select2({
                        placeholder: data[3],
                        dropdownParent:  $("#appmodal"),
                        width: '350px',
                        tags: false, selectOnBlur: true,
                        ajax: {
                            url:  "{{route('label')}}/status_khairat",
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

                    let data = $(this).val();
                        @this.set('status', data);        
                    });
                }

               
        });
    </script>
@include('components.toastr')
@endpush