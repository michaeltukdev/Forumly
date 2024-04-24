@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Forums' => 'panel.forums.categories']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <x-partials.panel.page-title title="Forums" description="Manage your forums." />
            
            <a wire:navigate href="{{ route('panel.forums.create') }}" class="px-4 py-2 transition rounded-lg bg-primary hover:bg-secondary text-container">New Category</a>
        </div>

        <livewire:partials.panel.tables.main-table 
            :model="'App\\Models\\Forums'"
            :columns="[
                'name' => 'Forum Name',
                'slug' => 'Forum Slug',
                'summary' => 'Forum Summary',
                'icon' => 'Icon',
                'categoryName' => 'Category',
            ]"
            searchColumn="name" 
            sortColumn="created_at" 
            edit="panel.forums.edit"
            />  

    </div>
@endsection
