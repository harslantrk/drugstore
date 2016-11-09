<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Supports;
use App\User;
use Auth;
use App\Helpers\Helper;

class SupportsController extends Controller
{
    public function __construct(Request $request)
    {
        $url = $request->path();
        Helper::sessionReload();
        $sess= Helper::shout($url);
        $this->read=$sess['r'];
        $this->update=$sess['u'];
        $this->add=$sess['a'];
        $this->delete=$sess['d'];
        $this->sess=$sess;

    }
    public function index()
    {
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.receiver_id')
            ->select('supports.*', 'users.name as userName')
            ->paginate(5);
        $conditionsSent = array('draft_option' => 0, 'sender_id' => Auth::user()->id);    
        $count['inbox'] = Supports::where('status','!=' ,0 )->where('sender_id','!=' ,Auth::user()->id )->where('supports.junk_option', 0)->count();
        $newMessages = Supports::where('read_option',0)->get();
        $count['Sent'] = Supports::where($conditionsSent)->count();
        $count['newMessage'] = Supports::where('read_option',0)->where('sender_id','!=' ,Auth::user()->id)->count();
        $count['Draft'] = Supports::where('draft_option',1)->count();
        $count['Junk'] = Supports::where('junk_option',1)->count();
        $count['Trash'] = Supports::where('status',0)->count();

        return view('admin.support.index')->with(['messages' => $messages,'newMessages' => $newMessages,'count' => $count, 'deleg' => $this->sess]);
    }

    public function showInbox()
    {
        $count['inbox'] = Supports::where('status',1)->count();
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.junk_option', 0)
            ->where('supports.status', '!=' , 0 )
            ->where('supports.sender_id', '!=' , Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.support.inbox')->with(['messages' => $messages,'count' => $count, 'deleg' => $this->sess]);
    }

    public function showSent()
    {
        $conditions = array('supports.draft_option' => 0, 'supports.sender_id' => Auth::user()->id  );
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.status' , '!=' , 0)
            ->where($conditions)
            ->get();

        /*echo "<pre>";
        print_r($messages);
        die();*/
        return view('admin.support.sent')->with(['messages' => $messages]);
    }

    public function showDraft()
    {
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.draft_option','1')
            ->get();

        return view('admin.support.draft')->with(['messages' => $messages]);
    }

    public function showJunk()
    {
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.receiver_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.junk_option','1')
            ->get();

        return view('admin.support.junk')->with(['messages' => $messages]);
    }

    public function showTrash()
    {
        $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.receiver_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.status','0')
            ->get();

        return view('admin.support.trash')->with(['messages' => $messages]);
    }

    public function showMessage(Request $request)
    {
        $id=$request->id;
        $readed = Supports::find($id);
        $readed->read_option = "1";
        $readed->save();
        
        $message = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.email as userMail', 'users.name as userName')
            ->where('supports.id', $id)
            ->get();

        return view('admin.support.readMessage')->with(['message' => $message]);
    }

    public function showSentMessage(Request $request)
    {
        $id=$request->id;
        
        $message = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.email as userMail', 'users.name as userName')
            ->where('supports.id', $id)
            ->get();

        return view('admin.support.readMessage')->with(['message' => $message]);
    }

    public function showCompose(Request $request)
    {
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $users = User::all();

        return view('admin.support.compose')->with(['users' => $users]);
    }

    public function showReply(Request $request)
    {
        $id=$request->id;
        $parentId = Supports::select('parent_id')->where('id', $id)->first();

        if ($parentId['parent_id']== 0) 
        {
            $conditionConv = array('supports.parent_id' => $id);
            
            $firstMessage = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.sender_id')
            ->select('supports.*', 'users.email as userMail', 'users.name as userName' , 'users.id as userId')
            ->where('supports.id',$id )
            ->get();
        }
        else
        {
            $conditionFm = array('supports.status' => 2, 'supports.id' => $parentId['parent_id'] );
            $conditionConv = array('parent_id' => $parentId['parent_id']);
            
            $firstMessage = DB::table('supports')
                ->join('users', 'users.id', '=', 'supports.sender_id')
                ->select('supports.*', 'users.email as userMail', 'users.name as userName' , 'users.id as userId')
                ->where($conditionFm)
                ->get();
        }

        $conversations = DB::table('supports')
                ->join('users', 'users.id', '=', 'supports.sender_id')
                ->select('supports.*', 'users.email as userMail', 'users.name as userName' , 'users.id as userId')
                ->where($conditionConv)
                ->get();
        

        
        return view('admin.support.reply')->with(['firstMessage' => $firstMessage, 'conversations' => $conversations]);
    }

    public function doCompose(Request $request)
    {
        $title= $request->input('title');
        $description= $request->input('description');
        $sender_id= $request->input('sender_id');
        $receiver_id= $request->input('receiver_id');

        $sendMessage = new Supports();
        $sendMessage->title = $title;
        $sendMessage->description = $description;
        $sendMessage->sender_id = $sender_id;
        $sendMessage->status = 2;
        $sendMessage->receiver_id = $receiver_id;
        $sendMessage->save();
        
        return redirect()->action('Admin\SupportsController@index');
    }

    public function doReply(Request $request)
    {
        $title= $request->input('title');
        $description= $request->input('replyDescription');
        $sender_id= Auth::user()->id;
        $receiver_id= $request->input('receiver_id');
        
        $message_id= $request->input('message_id');
        
        $saveSendMessage = new Supports();
        $saveSendMessage->title = $title;
        $saveSendMessage->description = $description;
        $saveSendMessage->sender_id = $sender_id;
        $saveSendMessage->receiver_id = $receiver_id;
        $saveSendMessage->parent_id = $message_id;
        $saveSendMessage->save();
        
        return redirect()->back();
    }

    public function doDelete(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->status = '0';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showInbox');
    }

    public function doSentDelete(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->status = '0';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showSent');
    }

    public function doDraft(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->draft_option = '1';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showDraft');
    }

    public function doSearch(Request $request)
    {
        $keyword=$request->keyword;
        if ($keyword != "*")
        {
            $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.receiver_id')
            ->select('supports.*', 'users.name as userName')
            ->where('title', 'like', '%' . $keyword . '%')
            ->where('supports.junk_option', 0)
            ->where('supports.status', '!=' , 0 )
            ->where('supports.sender_id', '!=' , Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();    
        }
        else
        {
            $messages = DB::table('supports')
            ->join('users', 'users.id', '=', 'supports.receiver_id')
            ->select('supports.*', 'users.name as userName')
            ->where('supports.junk_option', 0)
            ->where('supports.status', '!=' , 0 )
            ->where('supports.sender_id', '!=' , Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();
        }
        

        return view('admin.support.searchedInbox')->with(['messages' => $messages]);
    }

    public function doJunk(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->junk_option = '1';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showJunk');
    }

    public function doUndoDelete(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->status = '1';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showInbox');
    }

    public function doUndoJunk(Request $request)
    {
        $checkedItems=$request->val;
        $arr=explode("_", $checkedItems);
        foreach ($arr as $val) 
        {
            $updateInbox = Supports::find($val);
            $updateInbox->junk_option = '0';
            $updateInbox->save();
        }
        return redirect()->action('Admin\SupportsController@showJunk');
    }
}
