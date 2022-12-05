<?php

namespace App\Http\Controllers;

use App\Models\GST;
use App\Models\GstDocument;
use App\Models\IncomeTax;
use App\Models\IncomeTaxDocument;
use App\Models\TaxAudit;
use App\Models\TaxAuditDocument;
use App\Models\TDS;
use App\Models\TdsDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function InsertDocument(Request $request){
        $array = $request->all();
        if($request->tax_type=='income_tax'){
            $incometax = IncomeTax::create($array);
           if($request['income_type']){
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $file){
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/Library/IncomeTax'),$name);
                    $array['documents'] = $name;
                    $image = new IncomeTaxDocument();
                    $image->incometax_id = $incometax['id'];
                    $image->type = $request['income_type'];
                    $image->documents = $name;
                    $image->save();
                }
            }
        }
            return redirect('admin/edit-user/'.$request['user_id']);
        }elseif($request->tax_type=='tds'){
            $newtds = TDS::create($array);
            if($request['tds_type']){
                if($request->hasFile('documents')){
                    foreach($request->file('documents') as $file){
                        $name = $file->getClientOriginalName();
                        $file->move(public_path('/Library/TDS'),$name);
                        $array['documents'] = $name;
                        $image = new TdsDocument();
                        $image->tds_id = $newtds['id'];
                        $image->type = $request['tds_type'];
                        $image->documents = $name;
                        $image->save();
                    }
                }
            }
            return redirect('admin/edit-user/'.$request['user_id']);
        }elseif($request->tax_type=='gst'){
           $newgstdata =  GST::create($array);
            if($request['gst_type']){
                if($request->hasFile('documents')){
                    foreach($request->file('documents') as $file){
                        $name = $file->getClientOriginalName();
                        $file->move(public_path('/Library/GST'),$name);
                        $array['documents'] = $name;
                        $image = new GstDocument();
                        $image->gst_id = $newgstdata['id'];
                        $image->type = $request['gst_type'];
                        $image->documents = $name;
                        $image->save();
                    }
                }
            }
            return redirect('admin/edit-user/'.$request['user_id']);
        }elseif($request->tax_type=='tax_audit'){
            $newtaxaudit = TaxAudit::create($array);
            if($request['tax_audit_type']){
                if($request->hasFile('documents')){
                    foreach($request->file('documents') as $file){
                        $name = $file->getClientOriginalName();
                        $file->move(public_path('/Library/TaxAudit'),$name);
                        $array['documents'] = $name;
                        $image = new TaxAuditDocument();
                        $image->tax_audit_id = $newtaxaudit['id'];
                        $image->type = $request['tax_audit_type'];
                        $image->documents = $name;
                        $image->save();
                    }
                }
            }
        }
        else{
            return redirect()->back()->with('warning','Please Fill A Valid Data!');
        }
    }
}
