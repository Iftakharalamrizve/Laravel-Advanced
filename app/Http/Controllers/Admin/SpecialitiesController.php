<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Speciality;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Speciality',
            'pageDes' => 'Speciality List'
        ];
        $specialities = Speciality::orderBy('id','DESC')->get();
        return view('backend.specialities.index',compact('specialities'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Speciality',
            'pageDes' => 'Speciality List'
        ];
        return view('backend.specialities.create')->with($pageInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $speciality = Speciality::find($id);
        $pageInfo = [
            'pageTitle' => 'Speciality',
            'pageDes' => 'Speciality Edit'
        ];
        return view('backend.specialities.edit', compact('speciality'))->with($pageInfo);
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
