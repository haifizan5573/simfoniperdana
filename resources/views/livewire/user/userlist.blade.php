@section('css')



<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                             <h4 class="card-title mt-4">User List</h4> 
     
                        </div>
                       
                        <div class="col-lg-6 d-flex justify-content-end">
                                <div class="app-search">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                    </div>
                                </div>
                                <div class="app-search">
                                    <div class="position-relative">
                                    <button type="button" onclick="window.location.href='{{ route('adduser')}}'" class="btn btn-primary waves-effect waves-light pb5">Add New User</button>
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
                                    <th class="align-middle">Role</th>
                                    <th class="align-middle">Group</th>
                                    <th class="align-middle text-center">Status</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>
                                       <a href="{{ route('userprofile',['uid'=>$user->id])}}">{{ $user->usercode }}</a>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                   
                                        @foreach($user->roles()->get() as $userrole)
                                        <span class="badge rounded-pill badge-soft-dark">{{ $userrole->name }}</span><br/>
                                        @endforeach
                                 
                                    </td>   
                                    <td>
                                       
                                        @foreach($user->Team as $team)
                                        <span class="badge rounded-pill badge-soft-primary">{{ $team->title }}</span><br/>
                                        @endforeach
                            
                                    </td>                                
                                    <td class="text-center">
                                        <span class="badge badge-pill {{ ($user->isactive==1)? 'badge-soft-success': 'badge-soft-danger' }}  font-size-11">{{ $user->Label()->first()->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            onclick="window.location.href='{{ route('edituser',['uid'=>$user->id])}}'"
                                            class="btn btn-primary btn-sm waves-effect waves-light">
                                            Edit
                                        </button>
                                   
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
                        {{ $users->links() }}
                        </div>
            </div>
        </div>
    </div>

   
  
@push('scripts')
    @if(!empty($toastrdata['message']))
    <script>
        $( document ).ready(function() {
            

            let data=[{ message: "{{$toastrdata['message']}}", 'alert-type': "{{$toastrdata['alert-type']}}" }]; 
           
           livewire.emit('showmessage',data);
        });
    </script>
    @endif
@include('components.toastr')
@endpush