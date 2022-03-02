<?php



namespace App\Http\Controllers;



use App\Models\Post;

use App\Models\Category;



use Illuminate\Http\Request;



class SearchController extends Controller

{

   

    public function __invoke(Request $request)

    {

        // $results = null ;

        $categories = Category::get() ;

        $query = $request->get('query');
        $results =  Post::search($request->input('query'))->get();
       
        if(!empty($query)) {
            $variable = $request->query('query');
            //var_dump($variable);exit();

            $results = Post::search($query, function ( $meilisearch, $query,$options) use ($request) {
           // $options['category_id=20'];
            if($categoryId = $request->get('category_id')) {
                   
                    $options['filter'] ='category_id='.$categoryId;

//dd($options);                   
                    //the all error is from filters, yes... why filters ? 
                    return $meilisearch->search($query,$options);
                }
            })->get();

            
            $results = Post::search($variable)->get();
           // dd($results);
            //var_dump($results);exit();
            // you need to do something like this
            // return view('search', compact('results')); 
       
            //$results = collect();
            //it return just the else

        } else {
            $results = Post::get();
        }



        return view('search' , [

            'results' => $results,

            'categories' => $categories

        ]);

    }

}