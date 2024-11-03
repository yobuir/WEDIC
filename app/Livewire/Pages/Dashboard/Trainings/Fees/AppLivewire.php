<?php

namespace App\Livewire\Pages\Dashboard\Trainings\Fees;

use Livewire\Component;
use Livewire\WithPagination;

class AppLivewire extends Component
{

    use WithPagination;

    public $search = '';
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $page;
    public $columns;
    public $model;
    public $id;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortDirection' => ['except' => 'asc'],
        'page' => ['except' => 1],
    ];



    public $openModel;

    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function closeModal()
    {
        $this->openModel = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortByC($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }


    public function mount($id, $model, $columns)
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->id = $id;
    }

    public function Modify(){

    }

    public function render()
    {

        $query = $this->model::query();

        if ($this->search) {
            $query->where(function ($q) {
                foreach ($this->columns as $column) {
                    $q->orWhere($column, 'like', '%' . $this->search . '%');
                }
            });

            $totalResults = $query->count();
            $perPage = min($totalResults, 100);
        } else {
            $perPage = $this->perPage;
        }

        $data = $query->orderBy($this->sortBy, $this->sortDirection)
            ->where('training_id', $this->id)
            ->paginate($perPage);

        return view('livewire.pages.dashboard.trainings.fees.app-livewire', [
            'data' => $data
        ]);
    }
}
