<div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Forms</h4>

            <table class="table">
                @foreach($forms as $act)

                        <tr>
                            <td>
                                 <i class="bx bx-time-five align-middle me-1"></i> 
                                 {{$act->description}}<br/>
                                <small>{{ $act->name}}</small>
                            </td>
                        </tr>

                @endforeach
            </table>    

        </div>
    </div>
</div>