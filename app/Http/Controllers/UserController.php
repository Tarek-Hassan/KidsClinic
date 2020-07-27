<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables ; 
use App\User;
use App\Patient;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index(Request $request)
    { 

        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('avatar', function($row){
                        return "/storage/$row->avatar";
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
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/users/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i> Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        
        if(Auth::user()->role=='2'){
            return view('users.index');
            
        }else{
            return view('patients.index');
            
        }
    }

    
    public function create() {
        $patients=Patient::all();
        return view('users.create',compact('patients'));
    }   

    
    public function store(StoreUserRequest $request) {
    // public function store(Request $request) {
if($request->profile){
    $request['avatar']=Storage::disk('public')->put('images',$request->profile);
}
        $user=User::create($request->all());
        // $user->createToken($request->email)->plainTextToken;
        return redirect()->route('users.index');
        
    }   
    
    
    public function edit(string $id) {
        $user=User::findOrFail($id);
        $patients=Patient::all();
        return view('users.edit', compact('user','patients'));
    }
    
    public function update(UpdateUserRequest $request, $id) {
        // public function update(Request $request, $id) {
            $request['password']=Hash::make($request->password);
            
            if($request->profile){
                // this to skip delete the defualt image
                if($request->oldimg !="images/avatar.png"){ 
                    Storage::disk('public')->delete($request->oldimg);
                }
                $request['avatar']=Storage::disk('public')->put('images',$request->profile);
            }else{
                $request['avatar']=$request->oldimg;
            }
            
            $userUpdate = User::findOrFail($id);
            $userUpdate->update($request->all());
          
            return redirect()->route('users.index');
        }
        
        public function destroy($id) {
            $users=User::find($id);
            if($users->avatar !="images/avatar.png"){
                Storage::disk('public')->delete($users->avatar);
            }
            $users->delete();
            return redirect()->back();
    }



}
