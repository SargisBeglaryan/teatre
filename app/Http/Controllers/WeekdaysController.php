<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Weekdays as Weekdays;

class WeekdaysController extends CrudController
{
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Weekdays());
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID', true)->style("width:100px");
        $this->grid->add('name', 'Name');
        $this->addStylesToGrid();
        return $this->returnView();
    }
    
    public function  edit($entity){
        parent::edit($entity);

        $this->edit = \DataEdit::source(new Weekdays());

        $this->edit->label('Edit Films');
        $this->edit->add('name', 'Name', 'text')->rule('required|min:5');
       
        return $this->returnEditView();
    }
    
}
