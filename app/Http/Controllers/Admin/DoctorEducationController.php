<?php

namespace App\Http\Controllers\Admin;

use App\DoctorEducation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageInfo = [
            'pageTitle' => 'Doctor Education',
            'pageDes' => 'Doctor Education List'
        ];
        $educations = DoctorEducation::orderBy('id','DESC')->get();
        return view('backend.educations.index',compact('educations'))->with($pageInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageInfo = [
            'pageTitle' => 'Doctor Education',
            'pageDes' => 'Doctor Education List'
        ];
        return view('backend.educations.create')->with($pageInfo);
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
        $education = DoctorEducation::find($id);
        $pageInfo = [
            'pageTitle' => 'Doctor Education',
            'pageDes' => 'Doctor Education Edit'
        ];
        return view('backend.educations.edit', compact('education'))->with($pageInfo);
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
