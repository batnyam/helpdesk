<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank';
    protected $fillable = ['id','name'];
    protected $hidden = ['created_at', 'updated_at'];

    public function __construct(){

    }

    public function newRankWithParam($name){
    	$this->name = $name;
    	$this->Save();
    }

    public function getRanks(){
    	return $this->all();
    }

    public function getRankByName($name){
    	return $this->where('name', $name)->first();
    }

    public function getRankById($id){
    	return $this->find($id)->get();
    }

    public function getFirstRank(){
        return $this->first()->take(1)->get();
    }

    public function getMaxRank(){
        return $this->max('id');
    }
}
