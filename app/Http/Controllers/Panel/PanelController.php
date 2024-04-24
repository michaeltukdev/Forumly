<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ForumCategories;
use App\Models\Forums;
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

    public function forums()
    {
        return view('pages.panel.forums.forums');
    }

    public function forumsCreate()
    {
        return view('pages.panel.forums.create');
    }

    public function forumsEdit(Forums $forums)
    {
        return view('pages.panel.forums.editforum', ['forum' => $forums]);
    }
    
    public function forumCategories()
    {
        return view('pages.panel.forums.categories');
    }

    public function forumCategoriesCreate()
    {
        return view('pages.panel.forums.createcategories');
    }

    public function forumCategoriesEdit(ForumCategories $category)
    {
        return view('pages.panel.forums.editcategories', ['category' => $category]);
    }
}
