<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artical extends Model
{
        protected $table='articals';

    protected $fillable=['user_id','category_id','title','description','tag','image'];

    public function category(){
        return $this->belongsTo('App\category');
    }

    public function user(){
        return $this->belongsTo('App\user');
    }
}
