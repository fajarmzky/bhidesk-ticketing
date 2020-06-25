<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\project;
use App\Models\customers;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class ProjectController extends Controller
{
    public function getAllProjects()
    {    
        $customers = customers::all();
        $project =  project::join('customers', 'customers.id', '=', 'project.id_customer')->get();
        return view('project.index', compact('project','customers'));
    }
    
    public function addProject(Request $request)
    {
        $this->validate($request, [
            'nama'      => 'required',
            'id_customer'    => 'required',
            'start_date'     => 'required',
            'end_date'   => 'required',
        ]);

        $data = new project;
        $data->name = $request->nama;
        $data->id_customer = $request->id_customer;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();
        
        return response()->json([
           'success'    => true,
           'message'    => 'Project Created'
        ]);
    }

    public function editProject($id){
        $data = project::where('id', $id)->first();
        return $data;
    }

    public function updateProject(Request $request, $id){

        $this->validate($request, [
            'nama'      => 'required',
            'id_customer'    => 'required',
            'start_date'     => 'required',
            'end_date'   => 'required',
        ]);
        $update = DB::table('project')
                            ->where('id', $id)
                            ->update([
                                'id'    => $request->id, 
                                'name'      => $request->nama,
                                'id_customer'      => $request->id_customer,
                                'start_date'      => $request->start_date,
                                'end_date'      => $request->end_date,
                            ]);

        return response()->json([
            'success'    => true,
            'message'    => 'Project Updated'
        ]);
    }

    public function deleteProject($id){

        $deleteCategori = DB::delete('delete from project where id = ?', [$id]);

        return response()->json([
            'success'    => true,
            'message'    => 'Data Deleted'
        ]);
    }

}
