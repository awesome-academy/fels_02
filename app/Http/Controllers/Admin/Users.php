<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Models\Role;
use File;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::join('role', 'role.role_id', '=', 'users.role_id')->paginate(config('setting.number_userPaginate'));

        return view('admin.users.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles = Role::where('role_id', '!=', config('setting.number_whereRoleID'))->pluck('role_name', 'role_id');

       return view('admin.users.add', compact('Roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->birthday;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->status = config('setting.statusUser');

        if ($request->file('avatar') == null) {
            $user->avatar = config('setting.unknown_user_img');
        } else {
            $user->avatar = $request->file('avatar');
            $avatar = $request->file('avatar');
            $time = time();
            $end_file = $avatar->getClientOriginalExtension();
            $file_name = 'User-'.$time.'.'.$end_file;
            $user->avatar = $file_name;
            $avatar->move(config('setting.folder_user_img'), $file_name);
        }

        $resultAdd = $user->save();
        if($resultAdd) {

            return redirect()->route('user.index')->with('msg', trans('adminMess.msg_addUserSuccess'));
        } else {

            return redirect()->route('user.create')->with('msg', trans('adminMess.msg_addUserFail'));
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
        $Roles = Role::where('role_id', '!=', config('setting.number_whereRoleID'))->pluck('role_name', 'role_id');
        $user = User::find($id);

        return view('admin.users.edit', compact('Roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->birthday;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        if ($request->file('avatar') == null) {
            if ($user->avatar != config('setting.unknown_user_img')) {
                File::delete(config('setting.folder_user_img').'/'.$user->avatar);

                $user->avatar = config('setting.unknown_user_img');
            } else {
                $user->avatar = config('setting.unknown_user_img');
            }
            $user->avatar = config('setting.unknown_user_img');
        } else {
            if ($user->avatar == config('setting.unknown_user_img')) {

                $user->avatar = $request->file('avatar');
                $avatar = $request->file('avatar');
                $time = time();
                $end_file = $avatar->getClientOriginalExtension();
                $file_name = 'User-'.$time.'.'.$end_file;
                $user->avatar = $file_name;
                $avatar->move(config('setting.folder_user_img'), $file_name);
            } else {

                File::delete(config('setting.folder_user_img').'/'.$user->avatar);

                $user->avatar = $request->file('avatar');
                $avatar = $request->file('avatar');
                $time = time();
                $end_file = $avatar->getClientOriginalExtension();
                $file_name = 'User-'.$time.'.'.$end_file;
                $user->avatar = $file_name;
                $avatar->move(config('setting.folder_user_img'), $file_name);
            }
        }

        $resultEdit = $user->save();
        if($resultEdit) {

            return redirect()->route('user.index')->with('msg', trans('adminMess.msg_editUserSuccess'));
        } else {

            return redirect()->route('user.edit')->with('msg', trans('adminMess.msg_editUserFail'));
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
        $user = User::find($id);
        $resultDel = $user->delete($id);
        File::delete(config('setting.folder_user_img').'/'.$user->avatar);
        if($resultDel) {

            return redirect()->route('user.index')->with('msg', trans('adminMess.msg_delUserSuccess'));
        } else {
            
            return redirect()->route('user.index')->with('msg', trans('adminMess.msg_delUserFail'));
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        
        if($presentStatus == config('setting.status_userActive1')){
            User::where('user_id', $id)->update(['status' => config('setting.status_userActive0')]);
        }
        else{
            User::where('user_id', $id)->update(['status' => config('setting.status_userActive1')]);
        }
    }
}
