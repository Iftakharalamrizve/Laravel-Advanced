<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUpload;
use Spatie\Permission\Models\Permission;
use App\Sector;
use App\User;
use Toastr;
use App\Doctor;
use App\Location;
class DoctorController extends Controller
{
     use FileUpload;

    private $doctor ;

    public function __construct()
    {
        $this->doctor = new Doctor ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Doctor',
            'pageDes' => 'Doctor List'
        ];
        $doctors = $this->doctor->orderBy('id','DESC')->with('user')->get();
        return view('backend.doctors.index',compact('doctors'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Doctor',
            'pageDes' => 'Doctor Create'
        ];
        $sector   = Sector::get()->toArray();
        $location = Location::get()->toArray();
        return view('backend.doctors.create',compact('sector','location'))->with($pageInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            if($request->hasfile('profile_image')){
                $imageLocation=$this->saveSingleImage($request->profile_image,'doctor');
                $request->merge(['image'=>$imageLocation]);
            }
            //create user with get required filed
            $userModel = new User; 
            $user = $userModel->create($request->only($userModel->getModel()->getFillable()));
            $user->assignRole(2);
            //create doctor with get required filed 
            $request->merge(['user_id'=>$user->id]);
            $this->doctor->create($request->only($this->doctor->getModel()->getFillable()));
            Toastr::success('Doctor successfully Created','Created');
            return redirect()->route('admin.doctors.index');
        }
        catch(ModelNotFoundException $e)
        {
            Toastr::success('Doct Can Not Created','error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
