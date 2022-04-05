



<div class="row">
    <div class="col-md-4">
                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                       
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>{{ Auth::user()->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nickname :</th>
                                                        <td>{{ Auth::user()->nickname}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>
                                                            @if(Auth::user()->Contacts()->first()!=NULL)
                                                            {{ Auth::user()->Contacts()->first()->phonenumber}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>{{ Auth::user()->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td>
                                                            @if(Auth::user()->Addresses()->first()!=NULL)
                                                            {{ Auth::user()->Addresses()->first()->street}}, {{ Auth::user()->Addresses()->first()->location}}
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