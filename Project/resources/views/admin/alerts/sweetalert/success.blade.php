@if (session('swal-success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "با موفقیت انجام شد",
            text: '{{ session('swal-success') }}',
            confirmButtonText: 'باشه',
        });
    </script>
@endif