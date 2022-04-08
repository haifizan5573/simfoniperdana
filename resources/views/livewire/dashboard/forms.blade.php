<div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Forms</h4>

            <table class="table">
                @foreach($forms as $act)

                        <tr>
                            <td>
                                 <i class="bx bx-receipt align-middle me-1"></i> 
                                 <a href="{{ route('form',['id'=>$act->id]) }}">{{$act->title}}</a><br/>
                              
                            </td>
                        </tr>

                @endforeach
            </table>    

        </div>
    </div>
</div>