<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['name', 'question', 'count', 'searchCount', 'created_user', 'updated_user'];
    protected $hidden = ['id'];

    public function __construct(){

    }

    // new Tag
    public function newTag($name, $question, $created_user){

    	$this->name = $name;
    	$this->question = $question;
    	$this->created_user = $created_user;

    	$this->Save();
    }

    // GET functions
    public function getCount(){
        return $this->count();
    }
    public function getTags(){
    	return $this->all();
    }

    public function getTagById($id){
    	return $this->find($id);
    }

    public function getTagByName($name){
    	return $this->where('name', $name)->get();
    }

    public function getTagByQuestion($id){
    	return $this->where('question', $id)->get();
    }

    public function getTagByCount(){
        return $this->orderBy('count', 'desc')->take(5)->get();
    }
}
