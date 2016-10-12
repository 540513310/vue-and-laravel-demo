<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function next(){
        // get next user
        return Article::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }
    public  function previous(){
        // get previous  user
        return Article::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

}
