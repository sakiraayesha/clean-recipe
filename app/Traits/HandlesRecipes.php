<?php

namespace App\Traits;

use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

trait HandlesRecipes 
{
    public function getLatestRecipes(): Collection
    {
        return Recipe::latest('id')->take(6)->get();
    }

    public function getTopChefs(): Collection
    {
        return User::withCount('followers')
                    ->orderBy('followers_count', 'desc')
                    ->with('profile')
                    ->take(10)
                    ->get();
    }

    public function getPopularTags(): Collection
    {
        return Tag::withCount('recipes')
                    ->orderBy('recipes_count', 'desc')
                    ->take(10)
                    ->get();
    }

    public function getPopularTopics(): SupportCollection
    {
        $recipeCountByCategoryWithLatestImg = DB::table('recipes as recipes_1')
                                                ->joinSub(Recipe::select(DB::raw('count(*) as recipes_count, MAX(id) AS latest_id'))
                                                                ->groupBy('category'), 'recipes_2', function (JoinClause $join) {
                                                                    $join->on('recipes_1.id', '=', 'latest_id');
                                                                })
                                                ->select(DB::raw('recipes_1.category as name, recipes_1.image, recipes_2.recipes_count'));
                        
        $recipeCountByCuisineWithLatestImg = DB::table('recipes as recipes_1')
                                                ->joinSub(Recipe::select(DB::raw('count(*) as recipes_count, MAX(id) AS latest_id'))
                                                                ->groupBy('cuisine'), 'recipes_2', function (JoinClause $join) {
                                                                    $join->on('recipes_1.id', '=', 'latest_id');
                                                                })
                                                ->select(DB::raw('recipes_1.cuisine as name, recipes_1.image, recipes_2.recipes_count'));

        return $recipeCountByCategoryWithLatestImg->union($recipeCountByCuisineWithLatestImg)
                                                    ->orderBy('recipes_count', 'desc')
                                                    ->take(10)
                                                    ->get();

    }

    // temp
    public function getTrendingRecipes(): Collection
    {
        return Recipe::take(5)->get();
    }
}