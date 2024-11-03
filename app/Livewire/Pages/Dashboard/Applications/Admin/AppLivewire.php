<?php

namespace App\Livewire\Pages\Dashboard\Applications\Admin;

use App\Models\Training;
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



    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortDirection' => ['except' => 'asc'],
        'page' => ['except' => 1],
        'applicationStatusFilter'
    ];


    public function render()
    {
        $query = Training::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->orWhere('title', 'like', '%' . $this->search . '%')->orWhere('created_at
                ', 'like', '%' . $this->search . '%');
            });

            $totalResults = $query->count();
            $perPage = min($totalResults, 100);
        } else {
            $perPage = $this->perPage;
        }

        $data = $query->orderBy($this->sortBy, $this->sortDirection)
            ->where('status', 'published')
            ->paginate($perPage);

        return view('livewire.pages.dashboard.applications.admin.app-livewire', [
            'trainings' => $data
        ]);
    }
}
