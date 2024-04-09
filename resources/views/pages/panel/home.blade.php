@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Dashboard' => 'panel']])
@endsection

@section('content')

<div class="container px-6 py-8 mx-auto">
    <h3 class="text-2xl font-medium">Dashboard</h3>
    <p class="mt-2 text-text-secondary">Welcome to your dashboard!</p>
</div>

@endsection
