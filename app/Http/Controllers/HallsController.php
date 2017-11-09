<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Halls as Halls;

class HallsController extends CrudController
{
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Halls());

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID')->style("width:100px");
        $this->grid->add('name', 'Name');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        $this->edit = \DataEdit::source(new Halls());

        $this->edit->label('Edit Halls');
        $this->edit->add('name', 'Name', 'text')->rule('required');
       
        return $this->returnEditView();
    }
    
}
