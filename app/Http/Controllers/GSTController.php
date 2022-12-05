<?php

namespace App\Http\Controllers;

use App\Models\GST;
use App\Models\GstDocument;
use Illuminate\Http\Request;

class GSTController extends Controller
{
    public function EditGstData($id=null){
        if($id){
            $gstdata = GST::where('id',$id)->first();
            $gstdocuments = GstDocument::where('gst_id',$id)->get();
            return view('admin.gst',compact('gstdata','gstdocuments'));
        }else{
            return back();
        }
    }

    public function UpdateGstData(Request $request,$id=null){
        $array = $request->all();
        $gstdata = GST::where('id',$id)->first();
        $gstdata->update($array);
        if($request['type']){
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $file){
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/Library/GST'),$name);
                    $array['documents'] = $name;
                    $image = new GstDocument();
                    $image->gst_id = $id;
                    $image->type = $request['type'];
                    $image->documents = $name;
                    $image->save();
                }
            }
        }
        return back();
    }

    public  function DeleteDocuments($id=null){
        GstDocument::where('id',$id)->delete();
        return back();
    }

    public function Deletedata($id=null){
        GST::where('id',$id)->first()->delete();
        GstDocument::where('gst_id',$id)->delete();
        return back();
    }
}
