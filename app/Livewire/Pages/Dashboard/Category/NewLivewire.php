<?php

namespace App\Livewire\Pages\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class NewLivewire extends Component
{

    public $name, $description, $category_id;
    public $openModel;
    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function save()
    {
        $this->openModel = false;
    }


    public function closeModal()
    {
        $this->openModel = false;
    }

    public function modify()
    {
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->category_id = '';
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        try {
            $category = Category::updateOrCreate(['id' => $this->category_id], ['name' => $this->name, 'description' => $this->description]);
            session()->flash('message', $this->category_id ? 'Category Updated Successfully.' : 'Category Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.category.edit', array('id' => $category?->id));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.category.new-livewire');
    }
}
