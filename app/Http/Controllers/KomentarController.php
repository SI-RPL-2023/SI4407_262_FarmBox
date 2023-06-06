<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        return view('komentar');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'feedback' => 'required'
        ]);
        Feedback::create($validated);
        return redirect(route('welcome'));
    }
}
