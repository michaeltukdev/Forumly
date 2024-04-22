<?php

namespace App\Livewire\Partials\Panel\Forms;

use Livewire\Component;
use App\Models\ForumCategories;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class EditCategory extends Component
{
    #[Validate] 
    public $name = '';

    #[Validate] 
    public $slug = '';

    #[Validate] 
    public $summary = '';
    
    public ForumCategories $category;

    public function rules()
    {    
        return [
            'name' => [
                'required',
                'min:3',
                'max:50',
                Rule::unique('forum_categories', 'name')->ignore($this->category->id),
            ],
            'slug' => [
                'required',
                'min:3',
                'string',
                Rule::unique('forum_categories', 'slug')->ignore($this->category->id),
            ],
            'summary' => 'max:100',
        ];
    }
    

    public function messages()
    {
        return [
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'name.unique' => 'The name has already been taken.',
            'slug.min' => 'The slug must be at least 3 characters.',
            'slug.string' => 'The slug must be a string.',
            'slug.unique' => 'The slug has already been taken.',
            'summary.max' => 'The summary may not be greater than 100 characters.',
        ];
    }

    public function update()
    {
        if(! auth()->user()->can('manage forum categories')) {
            abort(403);
        }

        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => "The category $this->name has been updated"]);

        return redirect()->to(route('panel.forums.categories'));
    }

    public function delete()
    {
        $this->category->delete();

        session()->flash('alert', ['type' => 'success', 'message' => "The category has been deleted!"]);

        return redirect()->route('panel.forums.categories');
    }

    public function mount(ForumCategories $category)
    {
        $this->category = $category;

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->summary = $category->summary;
    }

    public function render()
    {
        return view('livewire.partials.panel.forms.edit-category', ['category' => $this->category]);
    }
}
