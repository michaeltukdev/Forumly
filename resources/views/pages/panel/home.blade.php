@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Dashboard' => 'panel']])
@endsection

@section('content')

<div class="container px-6 py-8 mx-auto">
    <x-partials.panel.page-title title="Dashboard" description="Welcome to your dashboard." />
    
    <div class="grid grid-cols-1 gap-6 mt-8 lg:grid-cols-3">
        

        <x-partials.panel.widget title="Total Members" value="{{ $memberTotal }}" icon="heroicon-o-user-group" color="bg-green-300" />

        <x-partials.panel.widget title="Total Threads" value="{{ $threadsTotal }}" icon="heroicon-o-clipboard-document-list" color="bg-blue-300" />
        
        <x-partials.panel.widget title="Total Replies" value="{{ $memberTotal }}" icon="heroicon-o-chat-bubble-bottom-center-text" color="bg-purple-300" />


        <div class="border rounded-lg relativespace-y-4 border-input-border bg-container">
            <div class="flex items-center justify-between p-6 border-b border-input-border">
                <p class="font-medium text-text-secondary">Latest Users</p>
                <a wire:navigate href="{{ route('panel.users') }}" class="text-sm font-medium transition text-primary hover:text-secondary">View All</a>
            </div>

            <div class="flex flex-col gap-5 p-6">
                @foreach ($latestUsers as $user)
                <a class="flex items-center gap-2 group" href="#">
                    <img draggable="false" class="w-10" alt="Users avatar" src="{{ asset('assets/branding/logowithoutname.png') }}">
                    <div class="text-sm text-text-secondary">
                        <p class="font-medium transition text-text-primary group-hover:text-primary">{{ $user->username }}</p>
                        <p>Registered {{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
                
    </div>
</div>

@endsection
