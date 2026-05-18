<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Show a simple create page for a selected theme.
     */
    public function create(Request $request)
    {
        $theme = $request->query('theme', 'default');
        return view('create', ['theme' => $theme]);
    }
}
