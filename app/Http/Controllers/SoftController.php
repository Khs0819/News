<?php

namespace App\Http\Controllers;

use App\Models\Soft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SoftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function restore($id)
    {
        $restore = Soft::onlyTrashed()->findOrFail($id)->restore();

        if ($restore) {
            echo ' Success';
        } else {
            echo ' Failed';
        }
    }

    public function forceDelete($id)
    {
        $forceDelete = Soft::findOrFail($id)->forceDelete();

        if ($forceDelete) {
            echo 'Deleted Success';
        } else {
            echo 'Deleted Failed';
        }
    }

    public function index()
    {
        $softs = Soft::all();
        $softs = Soft::withoutTrashed()->get();
        // $softs = Soft::onlyTrashed()->get();
        // $softs = Soft::withTrashed()->get();

        foreach ($softs as $soft) {
            echo 'User ID: ' . $soft->id . ' | User Name: ' . $soft->name . ' | User email: ' . $soft->email . '<br>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $softs = new Soft();
        $softs->name = 'ahmed';
        $softs->email = 'ahmed@hotmail.com';
        $softs->password = Hash::make('12356789');

        $isSave = $softs->save();
        if ($isSave) {
            echo ' Success';
        } else {
            echo ' Failed';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $softs = Soft::destroy($id);
        return $softs ? 'success' : 'failed';
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
