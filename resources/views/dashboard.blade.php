@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-3">
            @include('layouts.components.card_block',[
                             'icon'=>'mdi mdi-bullseye-arrow mdi-lg',
                             'bgcolor'=>'bg-dark bg-gradient',
                             'title'=>"0 Application",
                             'subtitle'=>"&nbsp;",
                             'content'=>'Today Submission',

                            ])
    </div>
    <div class="col-md-3">
             @include('layouts.components.card_block',[
                             'icon'=>'dripicons-blog',
                             'bgcolor'=>'bg-success bg-gradient',
                             'title'=>"0 Application",
                             'subtitle'=>"RM0",
                             'content'=>'Total Disbursed - '.$curMonth,

                            ])

    </div>
    <div class="col-md-3">

            @include('layouts.components.card_block',[
                             'icon'=>'dripicons-blog',
                             'bgcolor'=>'bg-danger bg-gradient',
                             'title'=>"&nbsp;",
                             'subtitle'=>"RM0",
                             'content'=>'Pending Application',

                            ])
    </div>
    <div class="col-md-3">
             @include('layouts.components.card_block',[
                             'icon'=>'dripicons-blog',
                             'bgcolor'=>'bg-primary bg-gradient',
                             'title'=>"&nbsp;",
                             'subtitle'=>"RM0",
                             'content'=>'Latest Announcement',

                            ])
    </div>

</div>
@endsection
