<?php

namespace App\Http\Controllers;

use App\Administrative;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administratives = Administrative::all();
        return view('users.administratives.index')->with('administratives', $administratives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.administratives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $user = DB::table('users')->latest('id')->first();

        $administrative = new Administrative();
        $administrative->id = $user->id;
        $administrative->name = $request->get('name');
        $administrative->phone = $request->get('phone');
        $administrative->date_admission = $request->get('date_admission');
        $administrative->save();


        return redirect()->route('administratives.index');
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
        $administrative = Administrative::find($id);
        return view('users.administratives.edit')->with('administrative',$administrative);
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
        $administrative = Administrative::find($id);
        $administrative->name = $request->get('name');
        $administrative->phone = $request->get('phone');
        $administrative->date_admission = $request->get('date_admission');
        $administrative->save();
        return redirect()->route('administratives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrative = Administrative::find($id);
        $administrative->delete();

        $user = User::find($id);
        $user->delete();

        return redirect()->route('administratives.index');
    }
}
