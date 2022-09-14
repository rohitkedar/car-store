<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use Illuminate\Support\Facades\Hash;
use Auth;
class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
    public function index()
    {
        $mechanics = Mechanic::orderBy('id','desc')->get();
        return view('mechanics.index',['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('mechanics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/u||max:100',
            'number' => 'required|numeric|min:10|regex:/^[6-9]\d{9}$/',
            
        ]);
		$data = $request->all();
		$saved = Mechanic::create([
            'name' => $data['name'] ,          
            'number' => $data['number']           
        ]);
		
		return redirect('/mechanics')->with('success', 'mechanic added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$mechanic = Mechanic::find($id);
        
       return view('mechanics.edit',['mechanic' => $mechanic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$mechanic = Mechanic::find($id);
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|max:100',
            'number' => 'required|numeric|min:10|regex:/^[6-9]\d{9}$/',
        ]);
		$data = $request->all();		
		$mechanic->update($data);
		 return redirect('/mechanics')->with('success', 'mechanic updated successfully.');;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
