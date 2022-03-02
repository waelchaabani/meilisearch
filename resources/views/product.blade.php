<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $results = null;

        $categories = Category::get();

        if ($query = $request->get('query')) {
            $results = Post::search($query, function ($meilisearch, $query, $options) use ($request) {
                if ($categoryId = $request->get('category_id')) {
                    $options['filter'] = 'category_id=' .$categoryId;
                }

                return $meilisearch->search($query, $options);
            })
                ->paginate(5)
                ->withQueryString();
                $results->appends('query', null);

        }

        return view('search', [
            'results' => $results,
            'categories' => $categories
        ]);
    }
}
