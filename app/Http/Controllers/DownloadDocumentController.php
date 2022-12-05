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

class DownloadDocumentController extends Controller
{
    public function ARN($id = null){
        $gstdata = GST::where('id',$id)->first();
        $gstdocuments = GstDocument::where('gst_id',$gstdata['id'])->get();
        // return $gstdocuments;
        return view('frontend.login.gstdata',compact('gstdata','gstdocuments'));
    }

    public function Incomedata($id=null){
        $incometaxdata = IncomeTax::where('id',$id)->first();
        $incometaxdocuments = IncomeTaxDocument::where('incometax_id',$id)->get();
        return view('frontend.login.incometaxdata',compact('incometaxdata','incometaxdocuments'));
    }

    public function TDSdata($id=null){
        $tdsdata = TDS::where('id',$id)->first();
        $tdsdocuments = TdsDocument::where('tds_id',$id)->get();
        return view('frontend.login.tdsdata',compact('tdsdata','tdsdocuments'));
    }

    public function TaxAuditdata($id=null){
        $taxauditdata = TaxAudit::where('id',$id)->first();
        $taxauditdocuments = TaxAuditDocument::where('tax_audit_id',$id)->get();
        return view('frontend.login.taxauditdata',compact('taxauditdata','taxauditdocuments'));
    }
}
