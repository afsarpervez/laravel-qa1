<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Following Mutator will be in Question Model
    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=str_slug($value);
    }
    public function getUrlAttribute()
    {
        //return route('questions.show', $this->id);
        return '#';
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //$question->Question::find(1);
    //$question->user->email;

}
