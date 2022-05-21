@section('css')



<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                             <h4 class="card-title mt-4">Residents List - {{$street}} ({{$total}} Registered)</h4> 
     
                        </div>
                       
                        <div class="col-lg-8 d-flex justify-content-end">
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                                <div class="app-search">
                                    <div class="position-relative">
                                        <select class="form-control" wire:model="street">
                                            <option value="">All</option>
                                            @foreach($streetlist as $list)
                                                <option value="{{$list['name']}}">{{$list['name']}}</option>
                                            @endforeach
                                        </select>  
                                        <span class="bx bx-filter-alt"></span>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                   
                                    <th style="width: 20px;">
                                       User ID
                                    </th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Phone</th>
                                    <th class="align-middle">Role</th>
                                    <th class="align-middle">Street</th>
                                    <!-- <th class="align-middle text-center">Status</th>
                                    <th class="align-middle text-center">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            
                            

                            @foreach($users as $user)
                                <tr>
                                   
                                    <td>
                                       <a href="{{ route('userprofile',['uid'=>$user->id])}}">{{ $user->usercode }}</a>
                                    </td>
                                    <td><img src="{{ isset($user->avatar) ? Storage::url($user->avatar) : asset('/assets/images/user.png') }}" alt="Avatar" class="rounded-circle header-profile-user" > {!! strtoupper($user->name) !!}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> @if($user->Contacts()->first()!=NULL)
                                                            {{ $user->Contacts()->first()->phonenumber}}
                                        @endif
                                    </td>
                                    <td>
                                   
                                        @foreach($user->roles()->get() as $userrole)
                                        <span class="badge rounded-pill badge-soft-dark">{{ $userrole->name }}</span><br/>
                                        @endforeach
                                 
                                    </td>   
                                    <td>
                                                            @if($user->Addresses()->first()!=NULL)
                                                            {{ $user->Addresses()->first()->street}}, {{ $user->Addresses()->first()->location}}
                                                            @endif
                                                        
                                    </td>
                                    <!-- <td>
                                       
                                        @foreach($user->Team as $team)
                                        <span class="badge rounded-pill badge-soft-primary">{{ $team->title }}</span><br/>
                                        @endforeach
                            
                                    </td>                                 -->
                                  
                           
                                </tr>
                               
                            @endforeach
        
                            </tbody>
                        </table>
                    </div>
               
                    <!-- end table-responsive -->
                </div>
            </div>
         
            <div class="row ">

                        <div class="mt-10 ml-110">
                        {{ $users->links() }}
                        </div>
            </div>
            @include('components.modal',['size'=>'lg']) 
        </div>
       
    </div>
  
   
  
@push('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    @if(!empty($toastrdata['message']))
    <script>
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });
    </script>
    @endif
<script>
    window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
            });

        window.livewire.on('modal', data => {

                $('#appmodal').modal('show'); 

                document.getElementById("userlist").innerHTML = data[2]

                $(window).on('shown.bs.modal', function(e) { 
                    e.preventDefault();
                });

                $('#group').select2({
                        placeholder: "Select Group",
                        dropdownParent:  $("#appmodal"),
                        width: '350px',
                        tags: false, selectOnBlur: true,
                        ajax: {
                            url:  "{{route('teams')}}/group_default",
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

                    $('#group').on('change', function(e) {

                    let data = $(this).val();
                        @this.set('group', data);        
                    });
        });
</script>
@include('components.toastr')
@endpush