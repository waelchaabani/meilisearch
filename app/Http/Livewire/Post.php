<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $title='';
    public $body='';
    public $category_id='';
    protected $rules = [
        'title' => 'required|min:6',
        'body' => 'required|email',
        'category_id'=>'required'

    ];
    
    public function savePost(){
        $this->validate();
        

    }
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




    public function render()
    {
        return view('livewire.post');
    }
}
