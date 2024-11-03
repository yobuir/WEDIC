<?php

namespace App\Livewire\Pages\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class EditLivewire extends Component
{
    public $category, $category_id, $name, $description, $status;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->status = $this->category->status;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        try {
            $category = Category::updateOrCreate(['id' => $this->category_id], ['name' => $this->name, 'description' => $this->description, 'status'=>$this->status]);
            session()->flash('message', $this->category_id ? 'Category Updated Successfully.' : 'Category Created Successfully.');
            return redirect()->route('dashboard.category.');
        } catch (\Throwable $th) {
            
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function DeleteItem()
    {
        try {
            $this->category?->delete();
            return redirect()->route('dashboard.category.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.category.edit-livewire');
    }
}
