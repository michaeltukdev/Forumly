<?php

namespace App\Livewire\Pages\Public;

use App\Models\Forums;
use App\Models\Threads;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class CreateThread extends Component
{
    use WithRateLimiting;

    public Forums $forum;

    #[Validate()]
    public string $title;

    #[Validate()]
    public string $content;

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|min:3|max:65000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.min' => 'The title must be at least 3 characters.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'content.required' => 'The content is required.',
            'content.min' => 'The content must be at least 3 characters.',
            'content.max' => 'The content may not be greater than 65000 characters.',
        ];
    }

    public function mount($slug)
    {
        $this->forum = Forums::where('slug', $slug)->firstOrFail();
    }

    public function create()
    {
        try {
            $this->rateLimit(1);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'create' => "Slow down! Please wait another {$exception->secondsUntilAvailable} seconds to log in.",
            ]);
        }

        $this->validate();

        Threads::create([
            'title' => $this->title,
            'content' => $this->content,
            'tags' => '123',
            'forum_id' => $this->forum->id,
            'user_id' => auth()->id(),
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => 'Thread created successfully!']);

        return redirect()->route('forums', ['slug' => $this->forum->slug]);
    }

    public function render()
    {
        return view('livewire.pages.public.create-thread')
            ->layout('layouts.app', [
                'title' => 'Create Thread',
            ]);
    }
}
