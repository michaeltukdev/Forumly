@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Edit Forum' => 'panel.forums']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <x-partials.panel.page-title title="Edit Forum" description="Edit a forum." />
        </div>

        <livewire:partials.panel.forms.edit-forum :$forum />
    </div>
@endsection
