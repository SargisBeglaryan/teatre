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
        $this->grid->add('row', 'Row');
        $this->grid->add('column', 'Column');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        $this->edit = \DataEdit::source(new Halls());

        $this->edit->label('Edit Halls');
        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('row', 'Row', 'text')->rule('required');
        $this->edit->add('column', 'Column', 'text')->rule('required');
       
        return $this->returnEditView();
    }

    public function allSeans($id) {
        $id=htmlspecialchars($id);
        $allSeans = \App\Index::with('halls','films','weekdays')->where('hall_id', $id)->get();
        return view('halls.hallAllSeans')->with('allSeans', $allSeans)->render();
    }
    
}
