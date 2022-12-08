<?php

namespace App\Http\Controllers;

use App\Imports\GSTExcel;
use App\Imports\ImportData;
use App\Imports\IncomeTaxExcel;
use App\Imports\TaxAuditExcel;
use App\Imports\TDSExcel;
use App\Models\ExcelData;
use App\Models\GST;
use App\Models\IncomeTax;
use App\Models\TaxAudit;
use App\Models\TDS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Return_;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function CreateUser(){
        return view('admin.create-user');
    }

    public function InsertUser(Request $request){
        $array = $request->all();
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required|email',
            'number'    => 'required|integer',
            'pan_card'  => 'required',
            'city'      => 'required'
        ]);
        $array['pan_card'] = trim(strtoupper($request['pan_card']));
        $array['name'] = trim(ucwords($request['name']));
        $user =  User::create($array);
        $user->assignRole('user');
        if(!empty($request['tax_type'])){
            $this->validate($request,[
                'file' => 'required|file',
            ]);
            if($request['tax_type']=='gst'){
                Excel::import(new GSTExcel($user->id),$request->file('file')->store('files'));
            }
            elseif ($request['tax_type']=='income_tax') {
                Excel::import(new IncomeTaxExcel($user->id),$request->file('file')->store('files'));
            }
            elseif ($request['tax_type']=='tds') {
                Excel::import(new TDSExcel($user->id),$request->file('file')->store('files'));
            }else{
                Excel::import(new TaxAuditExcel($user->id),$request->file('file')->store('files'));
            }
        }
        return redirect('/admin/users');
    }

    public function User(Request $request){
        $search = $request->search;
        $user   = User::whereHas('roles',function($query){
            $query->where('name','!=','admin');
        })->where(function($query) use ($search){
            if($search){
                $query->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('pan_card','like','%'.$search.'%');
            }
        })->orderByDesc('id')->Paginate(10);
        return view('admin.users',compact('user'));
    }

    public function DeleteUser($id=null){
        User::where('id',$id)->delete();
        return redirect('admin/users');
    }

    public function EditUser($id=null){
        $user            = User::where('id',$id)->first();
        $income_tax_data = IncomeTax::where('user_id',$id)->Paginate(10);
        $gst_data        = GST::where('user_id',$id)->Paginate(10);
        $tds_data        = TDS::where('user_id',$id)->Paginate(10);
        $tax_audit       = TaxAudit::where('user_id',$id)->Paginate(10);
        return view('admin.edit-user',compact('user','income_tax_data','gst_data','tds_data','tax_audit'));
    }

    public function UpdateUser(Request $request,$id=null){
        $array = $request->all();
        $array['pan_card'] = trim(strtoupper($request['pan_card']));
        $array['name'] = trim(ucwords($request['name']));
        $user  = User::where('id',$id)->first();
        $user->update($array);
        if(!empty($request['tax_type'])){
            $this->validate($request,[
                'file' => 'required|file',
            ]);
            if($request['tax_type']=='gst'){
                Excel::import(new GSTExcel($id),$request->file('file')->store('files'));
            }
            elseif ($request['tax_type']=='income_tax') {
                Excel::import(new IncomeTaxExcel($id),$request->file('file')->store('files'));
            }
            elseif ($request['tax_type']=='tds') {

                Excel::import(new TDSExcel($id),$request->file('file')->store('files'));
            }else{
                Excel::import(new TaxAuditExcel($id),$request->file('file')->store('files'));
            }
        }
        return back();
    }

    public function DeleteData($id=null){
        ExcelData::where('id',$id)->delete();
        return back();
    }

    public function UploadDocument($id=null){
        $user = User::whereHas('roles',function($query){
            $query->where('name','!=','admin');
        })->orderByDesc('id')->get();
        $data = ExcelData::where('id',$id)->first();
        return view('admin.document',compact('user','data'));
    }

    public function UpdateDcoument(Request $request,$id=null){
        $document = [];
        $array    = $request->all();
        if($request->hasFile('upload_document')){
            foreach($request->file('upload_document') as $file){
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('/documents'),$name);
                $document[] = $name;
            }
        }
        $array['upload_document'] = json_encode($document);
        if($id){
            $documents = ExcelData::where('id',$id)->first();
            $documents->update($array);
            return back();
        }else{
            ExcelData::create($array);
            return redirect('admin/edit-user/'.$request['user_id']);
        }
    }
}
