<script src="{{ asset('/assets/libs/toastr/build/toastr.min.js') }}"></script>


<script>


window.livewire.on('showmessage', data => {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }


    var type = data[0]['alert-type'];
    switch (type) {
        case 'info':
            toastr.info(data[0]['message']);
            break;

        case 'warning':
            toastr.warning(data[0]['message']);
            break;

        case 'success':
            toastr.success(data[0]['message']);
            break;

        case 'error':
            toastr.error(data[0]['message']);
            break;
        default: 
            toastr.info(data[0]['message']);
    }
 
});

</script>