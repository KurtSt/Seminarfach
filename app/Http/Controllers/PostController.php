<?php

namespace App\Http\Controllers;

use App\Models\Veranstaltung;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Veranstaltung::latest()
                    ->paginate(9)->withQueryString()
        ]);
    }

    public function show(Veranstaltung $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
