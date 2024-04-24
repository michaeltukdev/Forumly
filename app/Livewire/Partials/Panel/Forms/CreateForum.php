<?php

namespace App\Livewire\Partials\Panel\Forms;

use App\Models\Forums;
use Livewire\Component;
use App\Models\ForumCategories;
use Livewire\Attributes\Validate;

class CreateForum extends Component
{
    #[Validate]
    public $name;

    #[Validate]
    public $slug;

    #[Validate]
    public $summary;

    #[Validate]
    public $icon;

    #[Validate]
    public $category;

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'summary' => 'min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:forums,slug',
            'icon' => 'required|min:3|max:100',
            'category' => 'required|exists:forum_categories,id',
        ]; 
    }

    public function messages()
    {
        return [
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'summary.min' => 'The summary must be at least 3 characters.',
            'summary.max' => 'The summary may not be greater than 255 characters.',
            'slug.min' => 'The slug must be at least 3 characters.',
            'slug.max' => 'The slug may not be greater than 255 characters.',
            'slug.unique' => 'The slug has already been taken.',
            'icon.min' => 'The icon must be at least 3 characters.',
            'icon.max' => 'The icon may not be greater than 100 characters.',
            'category.exists' => 'The category does not exist.',
            'category.required' => 'The category is required.',
        ];
    }

    public function create()
    {
        $this->validate();

        Forums::create([ 
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'icon' => $this->icon,
            'category_id' => $this->category,
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => "The forum $this->name has been created!"]);
        
        return redirect()->to(route('panel.forums'));
    }

    public function render()
    {
        return view('livewire.partials.panel.forms.create-forum', ['categories' => ForumCategories::all()]);
    }
}
