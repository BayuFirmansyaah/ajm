<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationCustom extends Component
{
    protected LengthAwarePaginator $paginator;

    public function mount(LengthAwarePaginator $paginator)
    {
        // Disimpan dalam properti protected, tidak akan di-serialize Livewire
        $this->paginator = $paginator;
    }

    public function gotoPage($page)
    {
        // Emit event agar komponen lain bisa merespons
        $this->dispatch('pageChanged', page: $page);
    }

    public function render()
    {
        $lastPage = $this->paginator->lastPage();
        $currentPage = $this->paginator->currentPage();

        $start = max(1, $currentPage - 2);
        $end = min($lastPage, $currentPage + 2);
        $pages = range($start, $end);

        return view('livewire.pagination-custom', [
            'pages' => $pages,
            'currentPage' => $currentPage,
            'lastPage' => $lastPage,
        ]);
    }
}
