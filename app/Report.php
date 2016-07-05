<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = ['question', 'answer', 'tag', 'comment', 'created_user', 'report_type', 'body'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted'];

    public function __construct(){

    }

    // new Report
    public function newReport($question, $answer, $tag, $comment, $created_user, $report_type, $body){
    	$this->question = $question;
    	$this->answer = $answer;
    	$this->tag = $tag;
    	$this->comment = $comment
    	$this->created_user = $created_user;
    	$this->report_type = $report_type;
    	$this->body = $body;
    	$this->Save();
    }

    // GET functions 
    public function getReports(){
    	return $this->all();
    }

    public function getReportById($id){
    	return $this->find($id);
    }

    public function getReportByQuestion($id){
    	return $this->where('question', $id);
    }

    public function getReportByAnswer($id){
    	return $this->where('answer', $id);
    }

    public function getReportByComment($id){
    	return $this->where('comment', $id);
    }

    public function getReportByTag($id){
    	return $this->where('tag', $id);
    }

    public function getReportByUser($id){
    	return $this->where('created_user', $id);
    }

    // DELETE functions
    public function deleteReport(){
    	$this->deleted = true;
    }
}
