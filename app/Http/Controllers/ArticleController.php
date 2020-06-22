<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $data = Article::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        return "/storage/$row->image";
                        })
                    ->addColumn('doctor_id', function($row){ 
                      return $row->user->name;
                    })
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/articles/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="/admin/articles/'.$row->id.'" class=" btn btn-info btn-sm m-1"><i class="fas fa-eye"></i></a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('articles.index');
    }

    
    public function create() {
        return view('articles.create');
    }   

    
    public function store(Request $request) {
        $request['doctor_id']=Auth::user()->id;
        $request['image']=Storage::disk('public')->put('images',$request->profile);
        $article=Article::create($request->all());
        return redirect()->route('articles.index');
        
    }   
    
    
    public function edit(string $id) {
        $article=Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
    public function show(string $id) {
        $article=Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
    
    public function update(Request $request, $id) {
            
            if($request->profile){
             
                    Storage::disk('public')->delete($request->oldimg);
                
                $request['image']=Storage::disk('public')->put('images',$request->profile);
            }else{
                $request['image']=$request->oldimg;
            }
            
            $articleUpdate = Article::findOrFail($id);
            $articleUpdate->update($request->all());
            $articleUpdate->fresh();
            return redirect()->route('articles.index');
        }
        
        public function destroy($id) {
            $article=Article::find($id);
            Storage::disk('public')->delete($article->image);
                        $article->delete();
            return redirect()->back();
    }


}
