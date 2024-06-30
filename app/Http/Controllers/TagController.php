<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function __invoke(Tag $tag): View
    {
        return view('explore', ['type' => 'tag', 'text' => $tag->name, 'recipes' => $tag->recipes]);
    }
}
