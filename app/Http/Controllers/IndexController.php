<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Index as Index;

class IndexController extends CrudController
{
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(Index::with('halls', 'weekdays', 'films'));

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID');
        $this->grid->add('{{$halls->name}}', 'Hall');
        $this->grid->add('{{$weekdays->name}}', 'Days of week');
        $this->grid->add('{{$films->name}}', 'Film');
        $this->grid->add('seans_time', 'Seans Time');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new Index());

        $this->edit->label('Edit Seans');
        $this->edit->add('weekdays','Day of Week','Select')->options(\App\Weekdays::pluck('name', 'id')->all())->rule('required');
        $this->edit->add('halls','Halls','Select')->options(\App\Halls::pluck('name', 'id')->all())->rule('required');
        $this->edit->add('films','Films','Select')->options(\App\Films::pluck('name', 'id')->all())->rule('required');
        $this->edit->add('seans_time', 'Seans Time', 'text')->rule('required');
       
        return $this->returnEditView();
    }
    public function index()
    {
        $obj = new \stdClass();
        $obj->halls = \App\Halls::all();
        $obj->films = \App\Films::all();
        // 
        return view('index')->with('object', $obj)->render();
    }
    
}
