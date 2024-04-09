<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function home()
    {
        $memberTotal = User::count();

        return view('pages.panel.home', ['memberTotal' => $memberTotal]);
    }
}
