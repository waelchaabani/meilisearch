<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\PostFactory;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;



class Post extends Model

{

    use HasFactory;

    use Searchable;




    protected $table = 'posts' ;

    protected $fillable = ['id','title','body','category_id']; //no type filtrable if exist ok
    




    
    public function category()
{
    return $this->belongsTo(Category::class,'category_id', 'id');
}
    public function user()

    {

        return $this->belongsTo(User::class);

    }

}