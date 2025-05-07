<nav aria-label="Page navigation">
    <ul class="pagination">
        <li class="page-item {{ $currentPage === 1 ? 'disabled' : '' }}">
            <a class="page-link" href="#" wire:click.prevent="gotoPage(1)">
                <i class="icon-base bx bx-chevrons-left icon-sm"></i>
            </a>
        </li>

        @foreach ($pages as $page)
            <li class="page-item {{ $page === $currentPage ? 'active' : '' }}">
                <a class="page-link" href="#" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
            </li>
        @endforeach

        <li class="page-item {{ $currentPage === $lastPage ? 'disabled' : '' }}">
            <a class="page-link" href="#" wire:click.prevent="gotoPage({{ $lastPage }})">
                <i class="icon-base bx bx-chevrons-right icon-sm"></i>
            </a>
        </li>
    </ul>
</nav>
