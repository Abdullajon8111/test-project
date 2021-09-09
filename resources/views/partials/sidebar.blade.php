<div class="list-group sidebar-menu">
    <a href="{{ route('home') }}"
       class="list-group-item list-group-item-action">
        Home
    </a>
</div>

@push('javascript')
    <script>
        let current = '{{ \Illuminate\Support\Facades\URL::current() }}';
        document.querySelector(`.sidebar-menu [href="${current}"]`)
            .classList.add('active');
    </script>
@endpush
