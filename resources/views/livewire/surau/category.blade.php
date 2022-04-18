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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                             <h4 class="card-title mt-4">Activity Categories</h4> 
                            
                        </div>
                       
                        <div class="col-lg-8 d-flex justify-content-end">
                                
                               
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>

                                @can('add-activities')

                                    <div class="app-search">
                                        <div class="position-relative">
                                        <button type="button" onclick="window.location.href='{{ route('addcategorysurau')}}'" class="btn btn-primary waves-effect waves-light pb5">Add Category</button>

                                        @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.addcategory','Edit Category','')\"",
                                                                'label'=>'Add Category',
                                                                'icon'=>'',
                                                                'loader'=>true,
                                                                'targetloader'=>"view",
                                            ])
                                        </div>
                                    </div>

                                @endcan
                               
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                  
                                    <th class="align-middle">Category Name Name</th>
                             
                                    <th class="align-middle text-center">Public Link</th>
                                    <th class="align-middle text-center">Status</th>
                                    @can('add-activities')
                                    <th class="align-middle text-center">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                   
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    <td >
                                     <a target="_blank" href="{{route('surauactivity',['actid'=>$category->id])}}">{{$category->name}}</a>
                                    </td>
                                   
                                    <td class="text-center">
                                   
                                    <span class="badge badge-pill {{ ($category->isactive==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11"> 
                                        @if($category->isactive==1)
                                        Active
                                        @else
                                        Inactive
                                        @endif
                                    </span>
                                   

                                    </td>
                                    @can('add-activities')
                                    <td class="text-center">

                                        
                                           @include('components.button',[
                                                                'type'=>'button',
                                                                'class'=>'btn btn-info btn-sm waves-effect waves-light',
                                                                'onclick'=>"wire:click=\"open('livewire.form.editsurauactivity','Edit Category',$category->id)\"",
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
                        {{ $categories->links() }}
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

        window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
            });

        window.livewire.on('modal', data => {

            $('#appmodal').modal('show'); 
                
        });
    </script>
@include('components.toastr')
@endpush