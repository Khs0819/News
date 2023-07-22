<?php

namespace App\Http\Controllers;

use App\Models\Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EloquentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eloquents = Eloquent::select('name')->get();
        // $eloquents = Eloquent::all();

        foreach ($eloquents as $eloquent) {
            echo  'ID: ' . $eloquent->id . '| Name: ' . $eloquent->name . '| Email' . $eloquent->email . '<br>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eloquents = new Eloquent();
        $eloquents->name = 'ALi Safi';
        $eloquents->email = 'ALi@k.com';
        $eloquents->password = Hash::make('123456789');

        $isSave = $eloquents->save();
        if ($isSave) {
            echo 'Success';
        } else {
            echo 'Failed';
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
        $eloquents = Eloquent::findOrFail($id);
        $eloquents = Eloquent::where('id', $id)->get();
        $eloquents = Eloquent::where('id', '=', $id)->first();
        $eloquents = Eloquent::where('id', $id)->get();


        echo  'ID: ' . $eloquents->id . '| Name: ' . $eloquents->name . '| Email' . $eloquents->email . '<br>';

        // $eloquents = Eloquent::findOrFail($id);
        // $isDelete = $eloquents->delete();

        // return $isDelete ? 'Deleted Successfully' : 'Deleted Failed';

        $eloquents = Eloquent::destroy($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eloquents = Eloquent::findOrFail($id);
        $eloquents->name = 'omer';
        $eloquents->email = 'omer@o.com';

        $isUpdated = $eloquents->save();

        if ($isUpdated) {
            echo 'updated successfully';
        } else {
            echo 'Faild';
        }
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
