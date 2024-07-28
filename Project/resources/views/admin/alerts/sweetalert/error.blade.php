@if (session('swal-error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "با مشکل مواجه شدید",
            text: '{{ session('swal-error') }}',
            confirmButtonText: 'باشه',
        });
    </script>
@endif