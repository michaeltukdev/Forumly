@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Forum Categories' => 'panel.forums.categories']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <x-partials.panel.page-title title="Create Forum Category" description="Create a forum category" />
        </div>

        <livewire:partials.panel.forms.create-category />
    </div>
@endsection
