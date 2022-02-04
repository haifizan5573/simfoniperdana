<div class="card {{ $bgcolor }} text-white-50">
    <div class="card-body" style="height: 120px;">
            <div class="row">
                <div class="col-md-8">
                <h5 class="mt-0 mb-4 text-white">{!!$title!!}</i></h5>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <i class="{{ $icon }} text-white text-lg"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="card-text text-white">{!! $subtitle !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="card-text text-white">{{ $content }}</p>
                </div>
            </div>
            
    </div>                            
</div>