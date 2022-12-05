<?php

namespace App\Http\Controllers;

use App\Models\TaxAudit;
use App\Models\TaxAuditDocument;
use Illuminate\Http\Request;

class TaxAuditController extends Controller
{
    public function EditTaxAudit($id=null){
        $taxauditdata = TaxAudit::where('id',$id)->first();
        $taxauditdocuments = TaxAuditDocument::where('tax_audit_id',$id)->get();
        return view('admin.taxaudit',compact('taxauditdata','taxauditdocuments'));
    }

    public function UpdateTaxAudit(Request $request, $id=null){
        $array = $request->all();
        $taxauditdata = TaxAudit::where('id',$id)->first();
        $taxauditdata->update($array);
        if($request['type']){
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $file){
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/Library/TaxAudit'),$name);
                    $array['documents'] = $name;
                    $image = new TaxAuditDocument();
                    $image->tax_audit_id = $id;
                    $image->type = $request['type'];
                    $image->documents = $name;
                    $image->save();
                }
            }
        }
        return back();
    }

    public function DeleteDocuments($id=null){
        TaxAuditDocument::where('id',$id)->first()->delete();
        return back();
    }

    public function Deletedata($id=null){
        TaxAudit::where('id',$id)->first()->delete();
        TaxAuditDocument::where('tax_audit_id',$id)->delete();
        return back();
    }
}
