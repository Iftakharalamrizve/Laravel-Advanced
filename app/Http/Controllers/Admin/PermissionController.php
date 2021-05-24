<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Permission',
            'pageDes' => 'Permission List'
        ];
        $permissions = Permission::orderBy('id','DESC')->get();
        return view('backend.permissions.index',compact('permissions'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Permission',
            'pageDes' => 'Permission Create'
        ];
        return view('backend.permissions.create')->with($pageInfo);
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
        $permissions = Permission::create($input);
        Toastr::success('Permission successfully Created','Created');
        return redirect()->route('admin.permissions.index');
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
        $permission = Permission::find($id);
        $pageInfo = [
            'pageTitle' => 'Permission',
            'pageDes' => 'Permission Edit'
        ];
        return view('backend.permissions.edit', compact('permission'))->with($pageInfo);
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
        $permission = Permission::find($id);

        $this->validate($request,[
            'name'         => 'required',
        ]);
        $permission->update([
            'name'       =>  $request->name,
        ]);

        Toastr::success('Permission Successfully Updated.', 'Updated');
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        Toastr::success("Permission Successfully Deleted", "Deleted");
        return redirect()->route('admin.permissions.index');
    }
}
