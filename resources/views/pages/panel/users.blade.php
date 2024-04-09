@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Users' => 'panel.users']])
@endsection

@section('content')

<div class="container px-6 py-8 mx-auto">
    <h3 class="text-2xl font-medium">All Users</h3>
    <p class="mt-2 text-text-secondary">Creat and manage all your users!</p>
</div>

@endsection
