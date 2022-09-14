<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Auth;
class OwnerController extends Controller
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

        $owners = Owner::orderBy('id','desc')->get();
        return view('owners.index',['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('owners.create');
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
            'fullname' => 'required|regex:/^[a-zA-Z ]+$/u||max:100',
            'email' => 'required|email:rfc,dns|unique:owners',	
            'number' => 'required|numeric|min:10|regex:/^[6-9]\d{9}$/',		
			'address' => 'required'  
        ]);
		$data = $request->all();
		$saved = Owner::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],			
            'number' => $data['number'],	
            'address' => $data['address'],	
        ]);
		
		return redirect('/owners')->with('success', 'owner added successfully.');
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
		$owner = Owner::find($id);
       return view('owners.edit',['owner' => $owner]);
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
		$owner = Owner::find($id);
        $request->validate([
            'fullname' => 'required|regex:/^[a-zA-Z ]+$/u|max:100',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$owner->id,
            'number' => 'required|numeric|min:10|regex:/^[6-9]\d{9}$/',		
			'address' => 'required' 
        ]);
		$data = $request->all();		
		$owner->update($data);
		 return redirect('/owners')->with('success', 'owner updated successfully.');;
		
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
