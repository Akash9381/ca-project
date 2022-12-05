<?php

namespace App\Http\Controllers;

use App\Models\TDS;
use App\Models\TdsDocument;
use Illuminate\Http\Request;

class TDSController extends Controller
{
    public function EditTDS($id=null){
        $tdsdata = TDS::where('id',$id)->first();
        $tdsdatadocuments = TdsDocument::where('tds_id',$id)->get();
        return view('admin.tds',compact('tdsdata','tdsdatadocuments'));
    }

    public function UpdateTDS(Request $request, $id=null){
        $array = $request->all();
        $gstdata = TDS::where('id',$id)->first();
        $gstdata->update($array);
        if($request['type']){
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $file){
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/Library/TDS'),$name);
                    $array['documents'] = $name;
                    $image = new TdsDocument();
                    $image->tds_id = $id;
                    $image->type = $request['type'];
                    $image->documents = $name;
                    $image->save();
                }
            }
        }
        return back();
    }

    public function DeleteDocuments($id=null){
        TdsDocument::where('id',$id)->first()->delete();
        return back();
    }

    public function Deletedata($id=null){
        TDS::where('id',$id)->first()->delete();
        TdsDocument::where('tds_id',$id)->delete();
        return back();
    }
}
