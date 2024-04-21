@extends('layouts.panel')

@section('breadcrumbs')
    @livewire('partials.panel.breadcrumbs', ['path' => ['Users' => 'panel.users']])
@endsection

@section('content')
    <div class="container px-6 py-8 mx-auto">
        <x-partials.panel.page-title title="Users" description="Manage your users here." />

        <livewire:partials.panel.tables.main-table 
            :model="'App\\Models\\User'"
            :columns="['username' => 'Username', 'email' => 'Email', 'created_at' => 'Registered At']"
            searchColumn="username"
            sortColumn="created_at" 
            :specialFormats="['created_at' => 'diffForHumans']"/>
            
    </div>
@endsection
