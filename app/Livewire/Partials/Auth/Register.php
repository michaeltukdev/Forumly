<?php

namespace App\Livewire\Partials\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Mail\Message;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    #[Validate]
    public $email = '';

    #[Validate]
    public $username = '';

    #[Validate]
    public $password = '';

    #[Validate]
    public $password_confirmation = '';

    #[Validate]
    public $legal = false;

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:3|max:20',
            'password' => 'required|min:8|confirmed',
            'legal' => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'username.min' => 'The username must be at least 3 characters.',
            'username.max' => 'The username may not be greater than 20 characters.',
            'username.unique' => 'The username has already been taken.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'legal.accepted' => 'You must accept the terms and conditions.',
        ];
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.partials.auth.register');
    }
}
