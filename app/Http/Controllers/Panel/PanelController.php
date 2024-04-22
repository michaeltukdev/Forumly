<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class PanelController extends Controller
{
    public function home()
    {
        $memberTotal = User::count();

        $latestUsers = User::latest()->take(5)->get();

        return view('pages.panel.home', ['memberTotal' => $memberTotal, 'latestUsers' => $latestUsers]);
    }

    public function users()
    {
        return view('pages.panel.users');
    }

    public function forumCategories()
    {
        return view('pages.panel.forums.categories');
    }

    public function forumCategoriesCreate()
    {
        return view('pages.panel.forums.createcategories');
    }
}
