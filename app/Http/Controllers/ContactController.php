<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contactform(Request $request){
        $array = $request->all();
        $contact = Contact::create($array);
        if($contact){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function Index(Request $request){
        $search = $request->search;
        $contact = Contact::where(function($query) use ($search){
            if($search){
                $query->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('number','like','%'.$search.'%');
            }
        })->orderByDesc('id')->Paginate(10);
        return view('admin.contact',compact('contact'));
    }
}
