<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use App\Sector;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Sector',
            'pageDes' => 'Sector List'
        ];
        $sectors = Sector::orderBy('id','DESC')->get();
        return view('backend.sectors.index',compact('sectors'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Sector',
            'pageDes' => 'Sector Create'
        ];
        return view('backend.sectors.create')->with($pageInfo);
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
            'name'    => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg'
        ]);

        // Image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('backend/image/sector'), $imageName);

        } else {

            $imageName = 'placeholder.png';
        }

        Sector::create([
            'name'      =>$request->name,
            'image'     =>$imageName,
        ]);


        Toastr::success('Sector successfully Created','Created');
        return redirect()->route('admin.sectors.index');
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
        $sector = Sector::find($id);
        $pageInfo = [
            'pageTitle' => 'Sector',
            'pageDes' => 'Sector Edit'
        ];
        return view('backend.sectors.edit', compact('sector'))->with($pageInfo);
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
        $sector = Sector::find($id);

        $this->validate($request,[
            'name'         => 'required',
        ]);

        //upload image
        if ($request->hasFile('image')) {

            if($sector->image != 'placeholder.png') {
                // Delete previous image
                $imagePath = public_path('backend/image/sector/').$sector->image;

                File::delete($imagePath);

            }

            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('backend/image/sector'), $imageName);

        } else {

            $imageName = $sector->image;
        }
        $sector->update([
            'name'      =>$request->name,
            'image'     =>$imageName,
        ]);

        Toastr::success('Sector Successfully Updated.', 'Updated');
        return redirect()->route('admin.sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);

        if($sector->image != 'placeholder.png') {
            // Delete Photo

            $imagePath = public_path('backend/image/sector/').$sector->image;

            File::delete($imagePath);

        }

        $sector->delete();
        Toastr::success("Sector Successfully Deleted", "Deleted");
        return redirect()->route('admin.sectors.index');
    }
}
