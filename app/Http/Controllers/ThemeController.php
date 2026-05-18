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
        $allowed = [
            'elegan-grey',
            'black-java',
            'elegan-gold',
        ];

        $theme = $request->query('theme', 'elegan-grey');
        $theme = strtolower(trim($theme));
        $theme = str_replace([' ', '_'], '-', $theme);

        if (!in_array($theme, $allowed, true)) {
            $theme = 'elegan-grey';
        }

        return view('create', ['theme' => $theme, 'allowed' => $allowed]);
    }
}
