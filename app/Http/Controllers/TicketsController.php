<?php

namespace App\Http\Controllers;

use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Tickets as Tickets;

class TicketsController extends CrudController
{
	public function insertNewTicket(Request $request){
		$row = trim(htmlspecialchars($request->row));
		$column = trim(htmlspecialchars($request->column));
		$seans_id = trim(htmlspecialchars($request->seansId));
		$insertResult = Tickets::insert([
			['row' => $row, 'column' => $column, 'seans_id' => $seans_id],
		]);
		if($insertResult){
			return ['msg'=>'Congratulations! Ticket was buyed successfully', 'status'=>true];
		}
		return ['msg'=>'Error! Sorry, somethink was wrong!', 'status'=>false];
	}
    
}
