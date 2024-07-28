<script>
    $(document).ready(function () {
        var class_name = '{{ $class_name }}';
        var element = $('.' + class_name);
        $(element).click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: "ایا اطمینان دارید ؟",
                text: "ایا میخواهید این داده را حذف کنید",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#097969",
                cancelButtonColor: "#C21E56",
                confirmButtonText: "بله",
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                }
            });
        });
    });
</script>