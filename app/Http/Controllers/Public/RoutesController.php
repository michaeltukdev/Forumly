<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ForumCategories;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function home()
    {
        $forumCategories = ForumCategories::all()->sortBy('id');

        return view('pages.public.home', ['forumCategories' => $forumCategories]);
    }
}
