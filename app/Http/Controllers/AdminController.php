<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(5);
        // $this->authorize('viewAny', Admin::class);
        return response()->view('cms.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cities = City::all();
        // $roles = Role::where('guard_name', 'admin')->get();
        // $this->authorize('create', Admin::class);
        return response()->view('cms.admin.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $users->actor()->associate($admins);

     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',

        ]);
        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if ($isSaved) {
                $users = new User();
                // $roles = Role::findOrFail($request->get('role_id'));
                // $admins->assignRole($roles->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->date = $request->get('date');
                $users->city_id = $request->get('city_id');
                $users->address = $request->get('address');
                $users->mobile = $request->get('mobile');
                $users->actor()->associate($admins);

                $isSaved = $users->save();

                return response()->json(['icon' => 'success', 'title' => 'Created is Successfully'], 200);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        // $roles = Role::where('guard_name', 'admin')->get();
        $cities = City::all();
        // $this->authorize('update', Admin::class);

        return response()->view('cms.admin.edit', compact('admins', 'cities'));
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
        $validator = Validator($request->all(), [
            'password' => 'nullable',
        ]);

        if (!$validator->fails()) {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $isSaved = $admins->save();

            if ($isSaved) {
                $users = $admins->user;
                // $roles = Role::findOrFail($request->get('role_id'));
                // $admins->assignRole($roles->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->date = $request->get('date');
                $users->city_id = $request->get('city_id');
                $users->address = $request->get('address');
                $users->mobile = $request->get('mobile');
                $users->actor()->associate($admins);

                $isSaved = $users->save();

                return ['redirect' => route('admins.index')];
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::destroy($id);
        // $this->authorize('delete', Admin::class);
    }
}
