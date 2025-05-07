<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction as TransactionModel;
use Illuminate\Support\Facades\Cache;

class Transaction extends Component
{
    use WithPagination;

    public $keyword = '';
    public $search = ''; 
    public $page = 1;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function doSearch()
    {
        session(['search' => $this->search]);
        $this->render();
    }

    public function render()
    { 
        $startTime = microtime(true);

        $this->search = session('search');

        $transactions = TransactionModel::when(session('search'), function ($query) {
            $query->where('bara', 'like', '%' . session('search') . '%');
        })
        ->paginate(100) 
        ->withPath('/dashboard/transaction');

        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        return view('livewire.transaction', [
            'transactions' => $transactions,
            'executionTime' => $executionTime
        ]);
    }

    public function changePage($page)
    {
        $this->page = $page;
    }
}
