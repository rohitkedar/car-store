<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
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

        $users = User::orderBy('id','desc')->get();
        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('users.create');
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
            'email' => 'required|email:rfc,dns|unique:users',			
			'password' => 'required|string|min:8|confirmed',
			'password_confirmation' => 'required|string|min:8',
           
            
        ]);
		
	    
        
		
		$data = $request->all();
		$saved = User::create([
            'name' => $data['name'],
            'email' => $data['email'],			
            'password' => Hash::make($data['password']),			
			'created_by'=>Auth::user()->id
        ]);
		
		return redirect('/users')->with('success', 'user added successfully.');
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
		$user = User::find($id);
       return view('users.edit',['user' => $user]);
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
		$user = User::find($id);
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|max:100',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
        ]);
		$data = $request->all();
		$data['updated_by'] = Auth::user()->id;
		$user->update($data);
		 return redirect('/users')->with('success', 'user updated successfully.');;
		
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
