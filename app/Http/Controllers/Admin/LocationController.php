<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Location',
            'pageDes' => 'Location List'
        ];
        $locations = Location::orderBy('id','DESC')->get();
        return view('backend.locations.index',compact('locations'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Location',
            'pageDes' => 'Location Create'
        ];
        return view('backend.locations.create')->with($pageInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
        ]);

        $input = $request->all();
        $locations = Location::create($input);
        Toastr::success('Locations successfully Created','Created');
        return redirect()->route('admin.locations.index');
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
        $location = Location::find($id);
        $pageInfo = [
            'pageTitle' => 'Location',
            'pageDes' => 'Location Edit'
        ];
        return view('backend.locations.edit', compact('location'))->with($pageInfo);
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
        $location = Location::find($id);

        $this->validate($request,[
            'name'         => 'required',
        ]);
        $location->update([
            'name'       =>  $request->name,
        ]);

        Toastr::success('Locations Successfully Updated.', 'Updated');
        return redirect()->route('admin.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::find($id)->delete();
        Toastr::success("Location Successfully Deleted", "Deleted");
        return redirect()->route('admin.locations.index');
    }
}
