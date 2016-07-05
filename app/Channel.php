<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    protected $fillable = ['id', 'name', 'description', 'published', 'created_user', 'updated_user'];
    protected $hidden = ['created_at', 'updated_at'];

    public function __construct(){

    }

    public function newChannelWithParams(){

    }

    public function getCount(){
        return $this->count();
    }
    public function getLatestChannel(){
    	return $this->where('published', 1)->orderBy('created_at', 'desc')->take(5)->get();
    }
    public function getChannelInfo($id){
        return $this->where('id', $id)->get();
    }

    public function getAllChannelsByUser($id){
        return $this->where('created_user', $id)->orderBy('created_at', 'desc')->get();
    }


}
