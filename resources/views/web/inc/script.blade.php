<script src="{{ asset('') }}assets/admin/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/web/js/vendors.js"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('') }}assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

<script src="{{ asset('') }}assets/web/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"
  integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if ($massage = Session::get('success'))
<script>
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "{{ $massage }}",
    showConfirmButton: !1,
    timer: 3000
    })
    Swal();
</script>
@endif
@foreach ($errors->all() as $error)
<script>
    Swal.fire({
  position: "top-end",
  icon: "Error",
  title: "{{ $error}}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endforeach

@if ($massage = Session::get('error'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "Error",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif

@if ($massage = Session::get('warning'))
<script>
    Swal.fire({
  position: "center",
  icon: "warning",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif
<script>
    $(document).ready(function() {
        // Initialize Dropify
        $('.dropify').dropify();
    });
</script>