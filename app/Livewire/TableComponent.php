<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Model;

class TableComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $page;
    public $columns;
    public $model;
    public $customData;

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


    public function mount($model, $columns)
    {
        $this->model = $model;
        $this->columns = $columns;
    }

    public function Modify($id)
    {
        if ($this->model == 'App\Models\Category') {
            return redirect()->route('dashboard.category.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Blog') {
            return redirect()->route('dashboard.blog.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Training') {
            return redirect()->route('dashboard.training.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Team') {
            return redirect()->route('dashboard.team.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Course') {
            return redirect()->route('dashboard.course.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Contact') {
            $this->customData = Contact::where('id', $id)->first();
            $this->toggleModel();
        } elseif ($this->model == 'App\Models\User') {
            return redirect()->route('dashboard.users.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Partners') {
            return redirect()->route('dashboard.partners.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Event') {
            return redirect()->route('dashboard.event.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Project') {
            return redirect()->route('dashboard.project.edit', array('id' => $id));
        } elseif ($this->model == 'App\Models\Testimonial') {
            return redirect()->route('dashboard.testimonials.edit', array('id' => $id));
        } else {
            $this->toggleModel();
        }
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
            ->paginate($perPage);


        return view('livewire.table-component', [
            'data' => $data
        ]);
    }
}
