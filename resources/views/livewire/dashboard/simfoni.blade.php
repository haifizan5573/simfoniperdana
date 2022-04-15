<div class="row scrollClassX">

    @foreach($simfoni as $data)
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5>{{ $data['name'] }}</h5>
            </div>
        </div>
    </div>
    @endforeach

</div>