<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    protected $table = 'report_type';
    protected $fillable = ['name'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    // new Report type
    public function newReportType($name){
    	$this->name = $name;
    	$this->Save();
    }

    // GET functions
    public function getReportTypeById($id){
    	return $this->find($id);
    }

    public function getReportTypeByName($name){
    	return $this->where('name', $name);
    }

    // PUT functions
    public function putReportType($id, $name){
    	$type = $this->find($id);
    	$type->name = $name;
    	$type->Save();
    }
}
