<?php

namespace App\Http\Controllers;

use App\Models\IncomeTax;
use App\Models\IncomeTaxDocument;
use Illuminate\Http\Request;

class IncomeTaxController extends Controller
{
    public function EditIncomeTaxData($id){
        $incometaxdata      = IncomeTax::where('id',$id)->first();
        $incometaxdocuments = IncomeTaxDocument::where('incometax_id',$id)->get();
        return view('admin.incometax',compact('incometaxdata','incometaxdocuments'));
    }

    public function UpdateIncomeTaxData(Request $request,$id=null){
        $array = $request->all();
        $data  = IncomeTax::where('id',$id)->first();
        $data->update($array);
        if($request['type']){
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $file){
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/Library/IncomeTax'),$name);
                    $array['documents'] = $name;
                    $image = new IncomeTaxDocument();
                    $image->incometax_id = $id;
                    $image->type = $request['type'];
                    $image->documents = $name;
                    $image->save();
                }
            }
        }
        return back();
    }

    public  function DeleteDocuments($id=null){
        IncomeTaxDocument::where('id',$id)->delete();
        return back();
    }

    public function Deletedata($id=null){
        IncomeTax::where('id',$id)->first()->delete();
        IncomeTaxDocument::where('incometax_id',$id)->delete();
        return back();
    }
}
