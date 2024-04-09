@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Dashboard' => 'panel']])
@endsection

@section('content')

<div class="container px-6 py-8 mx-auto">
    <h3 class="text-2xl font-medium">Dashboard</h3>
    <p class="mt-2 text-text-secondary">Welcome to your dashboard!</p>
    
    <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-3">
        
        <x-partials.panel.widget title="Total Members" value="{{ $memberTotal }}" icon="heroicon-o-user-group" color="bg-green-300" />

        <x-partials.panel.widget title="Total Threads" value="{{ $memberTotal }}" icon="heroicon-o-clipboard-document-list" color="bg-blue-300" />
        
        <x-partials.panel.widget title="Total Replies" value="{{ $memberTotal }}" icon="heroicon-o-chat-bubble-bottom-center-text" color="bg-purple-300" />

    </div>
</div>

@endsection
