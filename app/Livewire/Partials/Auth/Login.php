<?php

namespace App\Livewire\Partials\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class Login extends Component
{
    use WithRateLimiting;

    #[Validate] 
    public String $email = '';

    #[Validate] 
    public String $password = '';

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function login()
    {
        try {
            $this->rateLimit(6);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => "Slow down! Please wait another {$exception->secondsUntilAvailable} seconds to log in.",
            ]);
        }
        
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('alert', ['type' => 'success', 'message' => 'Welcome back! You have been logged in!']);

            return $this->redirectRoute('home');
        }

        $this->addError('email', 'These credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.partials.auth.login');
    }
}
