<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables ; 
use App\User;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\StoreUserRequest;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('avatar', function($row){

                            if( strpos( $row->avatar, 'images' ) !== false) {
                                return "/storage/$row->avatar";
                            }
                            else{
                                return $row->avatar;
                            }
                        })

                    ->addColumn('role', function($row){ 
                        if($row->role == 0){
                            return 'user';
                        }
                        else if($row->role == 1){
                            return 'doctor';
                        }
                        else {return 'admin';
                        }
                    })

                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/users/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('users.index');
    }

    
    public function create() {
        return view('users.create');
    }   

    
    public function store(StoreUserRequest $request) {
    // public function store(Request $request) {

        $request['avatar']=Storage::disk('public')->put('images',$request->profile);
        $request['password']=Hash::make($request->password);
        $user=User::create($request->all());
        // $user->createToken($request->email)->plainTextToken;
        return redirect()->route('users.index');
    
    }   
        
    
    public function edit(string $id) {
        $user=User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id) {
    // public function update(Request $request, $id) {

        if($request->profile){
            Storage::disk('public')->delete($request->oldimg);
            $request['avatar']=Storage::disk('public')->put('images',$request->profile);
        }else{
            $request['avatar']=$request->oldimg;
        }

        $userUpdate = User::findOrFail($id);
        $userUpdate->update($request->all());
        $userUpdate->fresh();
        return redirect()->route('users.index');
    }

    public function destroy($id) {
        $users=User::find($id);
        Storage::disk('public')->delete($users->avatar);
        $users->delete();
        return redirect()->back();
    }



}
