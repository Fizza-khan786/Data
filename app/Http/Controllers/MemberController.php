<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MemberController extends Controller
{
    function saveData(Request $req){
        $sData=new Member; 
        $sData->user_id=Auth()->user()->id;
        $sData->name=$req->name;
        $sData->email=$req->email;
        $sData->text=$req->text;
        
            $req->validate([
            'up' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx'
            ]);
                $file = $req->file('up');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $sData->file_name= $fileName;
                $sData->file_path=public_path('uploads');
                // $filePath = $req->file('up')->storeAs( '/', $fileName,'uploads');
                // $sData->file_name =$req->up->getClientOriginalName();
                // $sData->file_path = '/storage/' . $filePath;
                $sData->save();
                return redirect()->route('display')
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
                $sData->save();         
    }

    function displayD(){
        $displayData=Member::where('user_id',Auth()->user()->id)->get();
        return view('table',['dataDisplay'=>$displayData]);
    }

    function deleteEntry($id){   
        $deleteData=Member::find((int)$id);
        $deleteData->delete();
        return redirect()->route('display');
    }

    function showData($id){
        $data=Member::find($id);
        return view('from',['data'=>$data]);
    }
    function edit(Request $req){
        $data=Member::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->text=$req->text;
        $data->save();
        return redirect('display');
    }

   function viewFile($id)
   {
       $user_info=Member::find((int)$id);
       $file_name=$user_info->file_name;
      
      $exists = Storage::disk('uploads')->exists('/'.$file_name);
    //   if($exists) {
     return  view('fileView',compact('user_info'));
       
   
//    }                
//    else {
//       abort(404);
//    }

   }

function downloadFile($id){
    $user_info=Member::find((int)$id);
    $file_name=$user_info->file_name;
    $exists = Storage::disk('uploads')->exists('/'.$file_name);
    
      if ($exists) {
          $content = public_path('uploads/'.$file_name);
          return Response::download($content);
      }
}




   }



