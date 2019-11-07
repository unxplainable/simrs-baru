<?php

namespace App\Http\Controllers\Setting;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\FunctionHelper;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();

        $users = User::with('role')->orderBy('nama_user', 'asc')->get();
        $roles = Role::orderBy('nama_role', 'asc')->get();

        return view('setting.user', [
            'users' => $users,
            'roles' => $roles,
            'menus' => $menus,
        ]);
    }

    public function userJson()
    {
        $users = User::with('role')->orderBy('nama_user', 'asc')->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'nama_user' => $user->nama_user,
                'email' => $user->email,
                'role_user' => $user->role->nama_role
            ];
        }

        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-modal" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
                <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-modal" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->input(), array(
        //     'nama_user' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'role_id' => 'required',
        //     'password' => [
        //         'required',
        //         'string',
        //         'min:8',             // must be at least 10 characters in length
        //         'regex:/[a-z]/',      // must contain at least one lowercase letter
        //         'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //         'regex:/[0-9]/',      // must contain at least one digit
        //         'regex:/[@$!%*#?&]/', // must contain a special character
        //     ],
        //     'confirmpassword' => 'required|same:password',
        // ));

        // if ($validator->fails()) {
        //     return response()->json([
        //         'error'    => true,
        //         'messages' => $validator->errors(),
        //     ], 422);
        // }

        // if (!strcmp($request->password, $request->confirmpassword) == 0) {
        //     $msg = ['password is not same as confirm password'];
        //     return response()->json([
        //         'error' => true,
        //         'messages' => $msg,
        //     ], 422);
        // }

        // $user = new User();
        // $user->nama_user = $request->nama_user;
        // $user->email = $request->email;
        // $user->id_role = $request->role_id;
        // $user->password = bcrypt($request->confirmpassword);
        // $user->save();

        $user = new User();
        $user->nama_user = $request->formData[0]["value"];
        $user->email = $request->formData[1]["value"];
        $user->id_role = $request->formData[2]["value"];
        $user->password = bcrypt($request->formData[4]["value"]);
        $user->save();

        return response()->json([
            'error' => false,
            'success' => 'Created succesfully!',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
        $role = $user->role->nama_role;

        return response()->json([
            'error' => false,
            'user' => $user,
            'role' => $role
        ], 200);

        // return $user->role->nama_role;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        $role = $user->role->nama_role;

        return response()->json([
            'error' => false,
            'user' => $user,
            'role' => $role
        ], 200);
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
        $user = User::findOrFail($id);

        $validator = Validator::make($request->input(), array(
            'nama_user' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role_id' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        if ($request->email == $user->email) {
            $user->nama_user = $request->nama_user;
            $user->id_role = $request->role_id;
        } else {
            $user->nama_user = $request->nama_user;
            $user->email = $request->email;
            $user->id_role = $request->role_id;
            if ($validator->fails()) {
                return response()->json([
                    'error'    => true,
                    'messages' => $validator->errors(),
                ], 422);
            }
        }
        $user->save();

        return response()->json([
            'error' => false,
            'success'  => 'Update successfully!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            User::destroy($req->id);
        }

        return response()->json([
            'error' => false,
            'success' => 'Deleted succesfully!',
            'respone-code' => 200
        ], 200);
    }
}
