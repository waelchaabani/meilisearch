<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

use DB;

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
                    // return $results->where('category_id',$request->get('category_id'));
                    if($categoryId = $request->get('category_id')){
                        $results = Post::search($query, function ( $meilisearch, $query,$options) use ($request) {
                    if($categoryId = $request->get('category_id')) {
                        // return $results->where('category_id',$categoryId);
                        $options['filter'] =['category_id='.$categoryId];
                        //dd($options);                   
                            return $meilisearch->search($query,$options);
                        }
                    })->paginate(1);
                     }else{
                        $results = Post::search($variable)->paginate(10);
                         }
                    } else {
                        $categoryId = $request->get('category_id');
                        $results = Post::when($categoryId,function($posts) use($categoryId){
                            $posts->where('category_id',$categoryId);
                        })->paginate(10);
                    }
                    return view('search' , [

                        'results' => $results,

                        'categories' => $categories,
                        'categoryId' =>  $request->get('category_id')
                    ]);
                 }
                 public function DeletePost($id){   
                        $post = Post::find($id);
                        $post->delete();
                
                        $notification = array(
                            'message' => 'User Deleted Successfully',
                            'alert-type' => 'info'
                        );
                
                        return Redirect()->back()->with($notification);

                    }

                    public function PostEdit($id){
                        $editData = Post::find($id);
                        return view('post.editPost',compact('editData'));                
                    }

                    public function PostUpdate(Request $request, $id){
                        $data = Post::find($id);
                        $data->title = $request->title;
                        $data->body = $request->body;
                        $data->category_id = $request->category_id;
                        $data->save();
                
                        $notification = array(
                            'message' => 'User Updated Successfully',
                            'alert-type' => 'info'
                        );
                
                        return Redirect()->back()->with($notification);
                
                    }

                    public function PostView($id){
                        $editData = Post::find($id);
                        return view('post.viewPost',compact('editData'));
                
                    }
                
                    public function PostAdd(Request $request){
                        $validatedData = $request->validate([
                            'title' => 'required|min:6',
                            'body' => 'required|min:8',
                            'category_id' => 'required',
                        ]);
                        $data = new Post();
                        $data->title = $request->title;
                        $data->body = $request->body;
                        $data->category_id = $request->category_id;
                        $data->save();
                        $notification = array(
                            'message' => 'User Updated Successfully',
                            'alert-type' => 'info'
                        );
                
                        return Redirect()->back()->with($notification);
                
                    }
                
              
}