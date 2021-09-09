@push('javascript')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            @if (Session::has('success'))
                swal('success', '{{ session('success') }}');
            @endif

            @if (Session::has('error'))
                swal('error', '{{ session('error') }}');
            @endif
        });
    </script>
@endpush
