<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\customers;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class CustomerController extends Controller
{
    public function getAllCustomers(){
        
        $customers = customers::all();
        return view('usercustomers.index', compact('customers'));
    }
    
    public function addCustomers(Request $request)
    {
        $this->validate($request, [
            'nama'      => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'telepon'   => 'required',
        ]);

        $data = new customers;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->save();
        
        return response()->json([
           'success'    => true,
           'message'    => 'Customers Created'
        ]);
    }

    public function editCustomers($id){
        $data = customers::where('id', $id)->first();
        return $data;
    }

    public function updateCustomers(Request $request, $id){

        $this->validate($request, [
            'nama'      => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'telepon'   => 'required',
        ]);
        $update = DB::table('customers')
                            ->where('id', $id)
                            ->update([
                                'id'    => $request->id, 
                                'nama'      => $request->nama,
                                'alamat'      => $request->alamat,
                                'email'      => $request->email,
                                'telepon'      => $request->telepon,
                            ]);

        return response()->json([
            'success'    => true,
            'message'    => 'Customers Updated'
        ]);
    }

    public function deleteCustomers($id){

        $deleteCategori = DB::delete('delete from customers where id = ?', [$id]);

        return response()->json([
            'success'    => true,
            'message'    => 'Data Deleted'
        ]);
    }

}
