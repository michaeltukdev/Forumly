<?php

namespace App\Livewire\Partials\Panel\Forms;

use App\Models\Forums;
use Livewire\Component;
use App\Models\ForumCategories;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class EditForum extends Component
{
    public Forums $forum;

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
            'slug' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('forums', 'slug')->ignore($this->forum->id),
            ],
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

    public function update()
    {
        $this->validate();

        $this->forum->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'icon' => $this->icon,
            'category_id' => $this->category
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => "The forum $this->name has been updated!"]);

        return redirect()->to(route('panel.forums'));
    }

    public function delete()
    {
        $this->forum->delete();

        session()->flash('alert', ['type' => 'success', 'message' => "The forum $this->name has been deleted!"]);

        return redirect()->to(route('panel.forums'));
    }


    public function mount(Forums $forum)
    {
        $this->forum = $forum;
        $this->name = $forum->name;
        $this->slug = $forum->slug;
        $this->summary = $forum->summary;
        $this->icon = $forum->icon;
        $this->category = $forum->category_id;
    }

    public function render()
    {
        return view('livewire.partials.panel.forms.edit-forum', ['categories' => ForumCategories::all()]);
    }
}
