<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builders = DB::table('builders')->get();
        // After Any Query use get()
        // $builders = DB::table('builders')->select('name', 'email')->get();
        foreach ($builders as $builder) {
            echo "User ID: " . $builder->id . " | User Name: " . $builder->name . " | User Email: " . $builder->email . '<br>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $builders = DB::table('builders')->insert([
            'name' => 'AliKhaled',
            'email' => 'AliKhaled@k.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        echo 'success';
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
        // get() Returns Array of Objects
        // $builders = DB::table('builders')->where('id', $id)->get();
        // foreach ($builders as $builder) {
        //     echo "User ID: " . $builder->id . " | User Name: " . $builder->name . " | User Email: " . $builder->email . '<br>';
        // }

        // first() Returns an object
        // $builders = DB::table('builders')->find($id);
        // echo "User ID: " . $builders->id . " | User Name: " . $builders->name . " | User Email: " . $builders->email . '<br>';

        $builders = DB::table('builders')->where('id', $id)->delete();
        echo 'Deleted Successfully';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $builders = DB::table('builders')->where('id', $id)->update([
            'name' => 'mohammed',
            'email' => 'mohammed@m.com'
        ]);

        echo 'Updated Successfully';
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
