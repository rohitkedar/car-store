<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Categorie;
use App\Models\Mechanic;
use App\Models\Owner;
use App\Models\Carmechanic;
use Illuminate\Support\Facades\Hash;
use Auth;
class CarController extends Controller
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
        $cars = Car::orderBy('id','desc')->get();
        return view('cars.index',['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::orderBy('id','desc')->get();
        $owner = Owner::orderBy('id','desc')->get();
		return view('cars.create',['categories' => $categories,'owner'=>$owner]);
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
            'number' => 'required',
            'model' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'owner_id' => 'required',
            'categorie_id' => 'required',
            
        ]);
		$data = $request->all();
		$saved = Car::create($data);
		
		return redirect('/cars')->with('success', 'car added successfully.');
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
		$car = Car::find($id); 
        $categories = Categorie::orderBy('id','desc')->get();
        $owner = Owner::orderBy('id','desc')->get();       
        return view('cars.edit',['car' => $car,'categories' => $categories,'owner'=>$owner]);
    }


    public function assignMechanic(){
        $categories = Categorie::orderBy('id','desc')->get();
        $mechanic = Mechanic::orderBy('id','desc')->get();
        return view('cars.assign-mechanic',['mechanic'=>$mechanic ,'categories' => $categories]);

    }

    public function storeMechanic(Request $request)
    {
         $request->validate([            
            'mechanic_id' => 'required',            
            'car_id' => 'required',
            'categorie_id' => 'required',
            
        ]);
		$data = $request->all();
		$saved = Carmechanic::create($data);
		
		return redirect('/cars/assign-mechanic')->with('success', 'mechanic  assigned successfully.');
    }

    public function getCars(Request $request)
    {
        $data = $request->all();
        $car = Car::where('categorie_id',$data['categorie_id'])->get(); 
        return response()->json(['car'=> $car]);
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
		$car = Car::find($id);
        $request->validate([
            'number' => 'required',
            'model' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'owner_id' => 'required',
            'categorie_id' => 'required',
        ]);
		$data = $request->all();		
		$car->update($data);
		 return redirect('/cars')->with('success', 'car updated successfully.');;
		
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
