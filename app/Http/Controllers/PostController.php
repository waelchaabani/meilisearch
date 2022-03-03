<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;



use App\Models\Post;


use DB;


class PostController extends Controller
{
    //
    public $title;
    public $body;
    public $category_id;

    public function PostAdd(){
    	return view('post.addPost');
    }
    public function PostView(){
    	// $allData = User::all();
    	return view('post.addPost');

    }





    
    
   
      public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required'
            
        ]);
        }
    protected $rules = [
        'title' => 'required|min:6',
        'body' => 'required|min:6',
        'category_id'=>'required'

    ];
    public function PostStore(Request $request){
    	$validatedData = $request->validate([
            'title' => 'required|min:6',
            'body' => 'required|min:8',
            'category_id' => 'required',
        ]);
    	$data->title = $request->title;
    	$data->body = $request->body;
    	$data->category_id = $request->category_id;
    	$data->save();

    	$notification = array(
    		'message' => 'User Inserted Successfully',
    		'alert-type' => 'success'
    	);
        

  
        Post::create($validatedData);
    }
}
