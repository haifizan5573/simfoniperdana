@extends('layouts.master-plain')
@section('title')
    Simfoni 5
@endsection
@section('body')
    <body class="auth-body-bg" style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; ">
@endsection
@section('content')
<div class="row">

<div class="row" style="margin-top: 10px;">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <img class="img-fluid" src="{{ Storage::url('attachment/RumahTerbukaSim5.jpg') }}" alt="" />
                <script src="https://cdn.logwork.com/widget/countdown.js"></script>
                <a href="https://logwork.com/countdown-zxgs" class="countdown-timer" data-style="flip2" data-timezone="Asia/Kuala_Lumpur" data-date="2023-05-20 20:30">Acara bermula dalam masa</a>
                

             
                {{-- <div wire:poll.1s>
                    Current time: {{ now() }}
                </div>
                <div wire:poll.60s>
                    <h4>Aktiviti Semasa: {{$currentEvent}}</h4>
                </div> --}}
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
                <div align="center">
                    <iframe src="https://wheeldecide.com/e.php?c1=FAIRUZ++31B&c2=HADZLIN+83A&c3=KAK+SU+6A&c4=SALINA+FAREZ+49B&c5=YUSRI+17B&c6=AHMAD+QAYYUM++34B+&c7=MAN+SKEPTRON++10B&c8=M+WARI+BIN+HARON++61A&c9=MARIAM+25A&c10=ASYRAF+OTHMAN+33A&c11=KASYAF+23A&c12=MOHD+ASRAFF++24B+&c13=FIZI+9B&c14=CHE+AS+12A&c15=AIMAN+26A&c16=AMRI+RIDHWAN+ISHAK+32A&c17=OMAR+23B&c18=NORHISHAM+%40+SHAM+BURGER+31B&c19=MOHD+RIDUAN+ABU+BAKAR+63A&c20=MUHAMMAD+MUIZ+BIN+HABDUL+BASIR++47B&c21=ABDUL+MUIN+BIN+AZMI++7A&c22=HAFIZ+47A&c23=FAIZOL+25B&c24=AMRIN+BIN+LAMIN+15A&c25=MARIAH+HAZWANI+BINTI+FADINLAH+2A&c26=ZULHAZMI+21A&c27=NUR+ALIA+75A&c28=ROSDIE+BIN+AHMAD++11A&c29=MUHAMMAD+SAFWAN++41B&c30=AZIZI+ABD+JALIL+43A&c31=NORHISHAM+31B&c32=WAN+RAHIMI+BIN+WAN+AZIZ+29A&c33=ALIEFF+SHAMIDA++29B&c34=DALINA+37A&c35=MOHD+FAIZAL+ABU+BAKAR+51A&c36=MUHAMAD+AIZUDDIN+BIN+NAZRI+35A&c37=ABDUL+MUDZIL+36A&c38=MOHD+ADYHUSAINI+ZAINAL+AZMI+2A&c39=NUR+FAZIERA++19A&c40=MUHAMMAD+%E2%80%98AZIM+BIN+YAAKOB+4B&c41=AZAM+44B&c42=FAIZOL+HANAFIE+25B&c43=MOHD+RIDUAN+BIN+ABU+BAKAR+63A&c44=AKRAM+ANUAR+38B&c45=MOHAMAD+RAMLAN+BIN+RAMLI+34A&time=5" width="700" height="700" scrolling="no" frameborder="0"></iframe>
                <p></p>
              {{-- <img class="img-fluid" src="{{ Storage::url('attachment/aktiviti.png') }}" alt="" /> --}}
            </div>
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