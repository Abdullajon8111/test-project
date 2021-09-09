<div class="list-group sidebar-menu">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">{{ __('Home') }}</a>
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">{{ __('Category') }}</a>
    <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">{{ __('Post') }}</a>
</div>

@push('javascript')
    <script>
        let full_url = "{{ Request::fullUrl() }}";
        let $navLinks = document.querySelectorAll(".sidebar-menu a");

        let $currentPageLink = Array.from($navLinks)
            .filter(function (elem) {
                return elem.getAttribute('href') === full_url
            });

        if(!$currentPageLink.length > 0) {
            $currentPageLink = Array.from($navLinks)
                .filter(function (elem) {
                    let link = elem.getAttribute('href');
                    if (link.startsWith(full_url))
                        return true;

                    return full_url.startsWith(link);
                });
        }

        if ($currentPageLink.length > 0) {
            $currentPageLink[0].classList.add('active')
        }
    </script>
@endpush
