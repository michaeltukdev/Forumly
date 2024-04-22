<?php

namespace App\Livewire\Partials\Panel\Forms;

use App\Models\ForumCategories;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateCategory extends Component
{
    #[Validate] 
    public $name = '';

    #[Validate] 
    public $slug = '';

    #[Validate] 
    public $summary = '';

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50|unique:forum_categories,name',
            'slug' => 'required|min:3|string|unique:forum_categories,slug',
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

    public function create()
    {
        if(! auth()->user()->can('manage forum categories')) {
            abort(403);
        }

        $this->validate();

        ForumCategories::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => "The category $this->name has been created!"]);

        return redirect()->to(route('panel.forums.categories'));
    }

    public function render()
    {
        return view('livewire.partials.panel.forms.create-category');
    }
}
