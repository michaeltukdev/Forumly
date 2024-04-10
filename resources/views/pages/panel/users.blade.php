@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Users' => 'panel.users']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <x-partials.panel.page-title title="Users" description="Manage your users here." />

        @livewire('partials.panels.tables.users')
    </div>
@endsection
