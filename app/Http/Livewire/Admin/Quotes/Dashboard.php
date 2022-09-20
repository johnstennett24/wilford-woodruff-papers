<?php

namespace App\Http\Livewire\Admin\Quotes;

use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Quote;
use Livewire\Component;

class Dashboard extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public $showDeleteModal = false;

    public $showEditModal = false;

    public $showFilters = false;

    public $filters = [
        'search' => '',
        'text' => '',
        'topic' => '',
    ];

    protected $queryString = [
        'sorts' => ['except' => ''],
        'filters' => ['except' => ''],
    ];

    protected $listeners = [
        'refreshQuotes' => '$refresh',
    ];

    public function mount()
    {
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'quotes.csv');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted '.$deleteCount.' quotes');
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = Quote::query()
                    ->with('page')
                    ->whereDoesntHave('actions')
                    ->when(array_key_exists('search', $this->filters) && $this->filters['search'], fn ($query, $search) => $query->where('text', 'like', '%'.$this->filters['search'].'%'))
                    ->when(array_key_exists('topic', $this->filters) && $this->filters['topic'], fn ($query, $topic) => $query->whereRelation(
                        'topics', 'name', '=', $topic
                    ));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.admin.quotes.dashboard', [
            'quotes' => $this->rows,
        ]);
    }
}
