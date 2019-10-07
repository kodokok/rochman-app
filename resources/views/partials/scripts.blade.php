<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- moment -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- dataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}} "></script>

<script src="{{ asset('plugins/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('plugins/adminlte/js/adminlte.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
