<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Times as Times;

class TimesController extends CrudController
{
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Times());
        $this->filter->add('id', 'ID', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID')->style("width:100px");
        $this->grid->add('name', 'Name');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new Times());

        $this->edit->label('Edit Halls');
        $this->edit->add('name', 'Name', 'text')->rule('required');
       
        return $this->returnEditView();
    }
    
}
