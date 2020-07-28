<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Article\ArticleRequest;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            if((Auth::user()->role) == '2'){
                $data = Article::latest()->get();
            }else{
                $data = Article::where('doctor_id',Auth::user()->id)->get();
            }
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('image', function($row){
                        return "/storage/$row->image";
                        })
                    ->addColumn('body', function($row){ 
                      return strip_tags($row->body);
                    })
                    ->addColumn('doctor_id', function($row){ 
                      return $row->user->name;
                    })
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/articles/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="/admin/articles/'.$row->id.'" class=" btn btn-info btn-sm m-1"><i class="fas fa-eye"></i> View</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i>  Delete</a>';
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

      
    public function store(ArticleRequest $request) {
     
        $request['doctor_id']=Auth::user()->id;
        if($request->profile){

            $request['image']=Storage::disk('public')->put('images',$request->profile);
        }
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
    
    public function update(ArticleRequest $request, $id) {
            
            if($request->profile){
             
                    Storage::disk('public')->delete($request->oldimg);
                
                $request['image']=Storage::disk('public')->put('images',$request->profile);
            }else{
                $request['image']=$request->oldimg;
            }
            
            $articleUpdate = Article::findOrFail($id);
            $articleUpdate->update($request->all());
          
            return redirect()->route('articles.index');
        }
        
        public function destroy($id) {
            $article=Article::find($id);
            Storage::disk('public')->delete($article->image);
                        $article->delete();
            return redirect()->back();
    }


}
