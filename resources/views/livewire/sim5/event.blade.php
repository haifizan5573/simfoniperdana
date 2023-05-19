@extends('layouts.master-without-nav')
@section('title')
    Simfoni 5
@endsection
@section('body')
    <body class="auth-body-bg" style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; ">
@endsection
@section('content')
<div>

<div class="row" style="margin-top: 10px;">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <img class="img-fluid" src="{{ Storage::url('attachment/RumahTerbukaSim5.jpg') }}" alt="" />
                <script src="https://cdn.logwork.com/widget/countdown.js"></script>
                <a href="https://logwork.com/countdown-zxgs" class="countdown-timer" data-style="flip2" data-timezone="Asia/Kuala_Lumpur" data-date="2023-05-20 20:00">Acara bermula dalam masa</a>
                
            </div>
        </div>
    </div>
    <div class="col-xl-1"></div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <h4>Cabutan Bertuah</h4>
            </div>
        </div>
    </div>
    <div class="col-xl-1"></div>
</div>
<div class="row">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <video style="width: 100%; height: auto;" controls>
                    <source src="{{ Storage::url('attachment/Rumah Terbuka.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <div class="col-xl-1"></div>
</div>

  
</div>
@endsection