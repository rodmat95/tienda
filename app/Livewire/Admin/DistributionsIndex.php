<?php

namespace App\Livewire\Admin;

use App\Models\Distribution;
use Livewire\Component;
use Livewire\WithPagination;

class DistributionsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $distributions = Distribution::whereHas('supplier', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->whereHas('product', function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })->latest('id')->paginate();

        return view('livewire.admin.distributions-index', compact('distributions'));
    }
}