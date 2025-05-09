<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction as TransactionModel;

class Transaction extends Component
{
    use WithPagination;

    public $search = '';

    public function mount()
    {
        $this->search = session('search', ''); 
    }

    public function doSearch()
    {
        session()->put('search', $this->search); 
        $this->resetPage();
    }

    public function render()
    {
        $startTime = microtime(true);

        $transactions = TransactionModel::when($this->search, function ($query) {
            $query->where('bara', 'like', '%' . $this->search . '%');
        })
        ->paginate(100)
        ->withPath('/dashboard/transaction');

        $executionTime = microtime(true) - $startTime;

        return view('livewire.transaction', [
            'transactions' => $transactions,
            'executionTime' => $executionTime,
        ]);
    }

    public function searchChanged()
    {
        session()->put('search', $this->search); 
        $this->resetPage(); 
    }
}
