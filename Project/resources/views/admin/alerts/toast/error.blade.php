@if (session('toast-error'))
    <div class="toast" data-delay="300">
        <div class="toast-body py-3 d-flex bg-danger text-white">
            <strong class="mr-auto">{{session('toast-error')}}</strong>
            <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidde="true">&times;</span>
            </button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.toast').toast('show');
        });
    </script>
@endif