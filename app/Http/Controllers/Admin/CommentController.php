<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use Auth;
use Carbon\Carbon;
use DB;
use File;
use Crypt;

class CommentController extends Controller
{	
    public function index(Request $request){
        $id = $request->id;
    	$comments = Comment::where('user_id',  $id )->get();
    	/*$emc_blog_table = DB::getSchemaBuilder()->getColumnListing('emc_blog');
    	return view('admin.blog.index',['blogs' => $blogs, 'emc_blog_table' => $emc_blog_table]);	*/
    	return view('admin.blog.comments')->with(['comments' => $comments]);
    }  

    public function edit(Request $request){
        $id = $request->id;
        $comments = Comment::find($id);
        return view('admin.blog.comment_edit')->with(['comments' => $comments]);
    } 
    public function save(Request $request){ 
        $degerler = $request->all();
        Comment::create($degerler);        
    }
    public function create(){
        return view('admin.blog.comments');
    }
    public function update(Request $request){

        $id = $request->input("id");        
        $CommentsData = Comment::find($id);
        $CommentsData->comment = $request->input("comment");
        $CommentsData->save();
        return redirect()->back();
            
    }

    public function delete(Request $request){

        $id = $request->id;
        $CommentsData = Comment::find($id);
        $CommentsData->status = 0;
        $CommentsData->save();
        return redirect()->action('Admin\CommentController@index');
    }    
}
