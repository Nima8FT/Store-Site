<script src="{{ asset('admin-assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/popper.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script src="{{ asset('admin-assets/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('#header-notification-toggle').click(function (e) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.notification') }}",
                data: { _token: "{{csrf_token()}}" },
                success: function (response) {
                    console.log('yes');
                }
            });
        });
    });
</script>