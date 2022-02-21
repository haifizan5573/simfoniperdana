<div class="modal fade bs-modal-center" id="appmodal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-{{$size}} modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="title"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="modal-loader" 
                        style="display: none; text-align: center;">
                        <div class="spinner-border text-success m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div id="dynamic-content"></div>
                                                      
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div>