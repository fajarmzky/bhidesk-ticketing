<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use App\Models\ticket;
use App\Models\project;
use App\Models\customers;
use App\Models\users;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class TicketController extends Controller
{
    public function getAllTickets()
    {    
        $customers = customers::all();
        $projects = project::all();
        $users = users::all();
        $ticket =  ticket::join('project', 'project.id', '=', 'ticket.id_project')
                            ->join('users', 'users.id', '=', 'ticket.id_user')
                            ->select('ticket.*','project.name as project_name','users.name as assign_to')
                            ->get();

        return view('ticket.index', compact('ticket','customers','projects','users'));
    }
    
    public function addticket(Request $request)
    {
        $this->validate($request, [
            'id_customer'      => 'required',
            'id_project'    => 'required',
            'type'     => 'required',
            'deskripsi'   => 'required',
            'solution'   => 'required',
            'id_user'   => 'required',
            'priority'   => 'required',
            'created_time'   => 'required',
            'finished_time'   => 'required',
        ]);

        $data = new ticket;
        $data->id_customer = $request->id_customer;
        $data->id_project = $request->id_project;
        $data->id_user = $request->id_user;
        $data->type = $request->type;
        $data->description = $request->deskripsi;
        $data->solution = $request->solution;
        $data->priority = $request->priority;
        $data->status = $request->status;
        $data->created_time = $request->created_time;
        $data->finished_time = $request->finished_time;
        $data->save();
        
        return response()->json([
           'success'    => true,
           'message'    => 'Ticket Created'
        ]);
    }

    public function editTicket($id){
        $data = ticket::where('id', $id)->first();
        return $data;
    }

    public function updateTicket(Request $request, $id){

        $this->validate($request, [
            'id_customer'      => 'required',
            'id_project'    => 'required',
            'type'     => 'required',
            'deskripsi'   => 'required',
            'solution'   => 'required',
            'id_user'   => 'required',
            'priority'   => 'required',
            'created_time'   => 'required',
            'finished_time'   => 'required',
        ]);
        $update = DB::table('ticket')
                            ->where('id', $id)
                            ->update([
                                'id_customer'       => $request->id_customer, 
                                'id_project'        => $request->id_project,
                                'type'              => $request->type,
                                'description'       => $request->deskripsi,
                                'solution'          => $request->solution,
                                'id_user'           => $request->id_user,
                                'priority'          => $request->priority,
                                'created_time'      => $request->created_time,
                                'finished_time'     => $request->finished_time,
                            ]);

        return response()->json([
            'success'    => true,
            'message'    => 'Customers Updated'
        ]);
    }

    public function deleteTicket($id){

        $deleteCategori = DB::delete('delete from ticket where id = ?', [$id]);

        return response()->json([
            'success'    => true,
            'message'    => 'Data Deleted'
        ]);
    }

}
