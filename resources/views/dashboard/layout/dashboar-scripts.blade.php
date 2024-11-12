    <!-- Vendor JS Files -->
    <script src="{{asset('assets/niceAdmin/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/quill/quill.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/niceAdmin/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/niceAdmin/js/main.js')}}"></script>

    
    
    
    {{-- my scipts --}}
    {{-- <script type='text/javascript' src="{{ asset('assets/jquery-3.6.4.min.js') }}"></script> --}}
    
    {{-- <script type='text/javascript' src="{{ asset('assets/niceAdmin/js/jquery.min.js') }}"></script>
    <script>

    </script>
    <script src="{{ asset('assets/niceAdmin/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/js/bootstrap-datepicker.min.js') }}"></script> --}}
    <script type='text/javascript' src="{{ asset('assets/jquery-3.6.4.min.js') }}"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    @yield('scripts')