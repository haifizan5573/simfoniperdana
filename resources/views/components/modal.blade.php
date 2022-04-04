<div wire:ignore.self class="modal fade bs-modal-center" id="appmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-{{$size}} modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if(!empty($title)){{$title}}@endif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(!empty($pagemodal))
                       @include($pagemodal)
                    @endif                                  
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div>