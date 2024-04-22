<?php

namespace App\Livewire\Partials\Panel\Tables;

use Livewire\Component;
use Livewire\WithPagination;

class MainTable extends Component
{
    use WithPagination;

    public $model;
    public $columns;
    public $searchColumn;
    public $sortColumn;
    public $sortDirection = 'desc';
    public $search = '';
    public $specialFormats;
    public $edit;

    protected $queryString = ['search', 'sortColumn', 'sortDirection'];

    public function mount($model, $columns, $searchColumn = null, $sortColumn = null, $sortDirection = 'desc', $specialFormats = [], $edit = null)
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->searchColumn = $searchColumn;
        $this->sortColumn = $sortColumn;
        $this->sortDirection = $sortDirection;
        $this->specialFormats = $specialFormats;
        $this->edit = $edit;
    }
    

    public function render()
    {
        $modelInstance = app($this->model);

        $query = $modelInstance->newQuery();

        if ($this->search && $this->searchColumn) {
            $query->where($this->searchColumn, 'like', '%' . $this->search . '%');
            
            $this->resetPage();
        }

        if ($this->sortColumn) {
            $query->orderBy($this->sortColumn, $this->sortDirection);
        }

        $data = $query->paginate(10);

        return view('livewire.partials.panel.tables.main-table', [
            'data' => $data,
            'columns' => $this->columns,
        ]);
    }
}