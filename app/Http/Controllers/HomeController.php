<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HandlesRecipes;
use Illuminate\View\View;

class HomeController extends Controller
{
    use HandlesRecipes;

    public function __invoke(): View
    {
        return view('home', [
            'trendingRecipes' => $this->getTrendingRecipes(),
            'latestRecipes' => $this->getLatestRecipes(),
            'topChefs' => $this->getTopChefs(),
            'popularTags' => $this->getPopularTags(),
            'popularTopics' => $this->getPopularTopics(),
        ]);
    }
}