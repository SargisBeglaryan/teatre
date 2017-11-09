<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Films as Films;

class FilmsController extends CrudController
{
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Films());
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

        $this->edit = \DataEdit::source(new Films());

        $this->edit->label('Edit Films');
        $this->edit->add('name', 'Name', 'text')->rule('required|min:5');
       
        return $this->returnEditView();
    }

    public function allSeans($id) {
        $id=htmlspecialchars($id);
        $allSeans = \App\Index::with('halls','films','weekdays')->where('film_id', $id)->get();
        return view('films.filmAllSeans')->with('allSeans', $allSeans)->render();
    }
    
}
