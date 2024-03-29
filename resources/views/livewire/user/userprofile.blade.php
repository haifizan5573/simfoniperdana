
@section('css')

<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection


<div class="row">
    <div class="col-md-4">
    <div class="card overflow-hidden">
                <div class="bg-info bg-soft" >
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">{{ env('APP_NAME')}}</h5>
                                                    <p>Community simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <!-- <img src="assets/images/profile-img.png" alt="" class="img-fluid"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0" style="height: 210px;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="{{ isset($user->avatar) ? Storage::url($user->avatar) : asset('/assets/images/user.png') }}" alt="" class="img-thumbnail rounded-circle" style="height: 70px !important; width: 100px!important">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>
                                                @foreach($user->roles()->get()->pluck('name')->toArray() as $role)
                                               
                                                <span class="badge rounded-pill badge-soft-primary">{{$role}}</span>
                                                @endforeach
                                                
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="pt-4">
                                                   
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15"></h5>
                                                            <p class="text-muted mb-0"></p>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="mt-4">
                                                        @if($type==2)
                                                        <a href="{{ route('editprofile') }}" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profile <i class="bx bx-pencil ms-1"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    </div>
    <div class="col-md-4">
                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                       
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>{{ $user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nickname :</th>
                                                        <td>{{ $user->nickname}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>
                                                            @if($user->Contacts()->first()!=NULL)
                                                            {{ $user->Contacts()->first()->phonenumber}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>{{ $user->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td>
                                                            @if($user->Addresses()->first()!=NULL)
                                                            {{ $user->Addresses()->first()->street}}, {{ $user->Addresses()->first()->location}}
                                                            @endif
                                                        
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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