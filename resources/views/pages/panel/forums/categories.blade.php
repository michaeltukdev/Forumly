@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Forum Categories' => 'panel.forums.categories']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <x-partials.panel.page-title title="Forum Categories" description="Manage your forums categories here." />
            
            <a href="{{ route('panel.forums.categories.create') }}" class="px-4 py-2 transition rounded-lg bg-primary hover:bg-secondary text-container">New Category</a>
        </div>

        <livewire:partials.panel.tables.main-table 
            :model="'App\\Models\\ForumCategories'"
            :columns="['name' => 'Category Name', 'slug' => 'Category Slug', 'summary' => 'Category Summary']"
            searchColumn="name" />

    </div>
@endsection
