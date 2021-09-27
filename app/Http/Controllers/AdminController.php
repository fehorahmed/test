<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function index()
    {
        return view('admin.admin_login');
    }

    public function auth(Request $request){
        $email= $request->post('email');
        $password= $request->post('password');
        $request->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required',
        ]);
        $result=admin::select('id','email','password','name')->where('email' ,'=', $email)->first();

        if($result){

            if(Hash::check($password, $result->password)){
                $request->session()->put('admin_login',true);
                $request->session()->put('admin_id',$result->id);
                $request->session()->put('admin_email',$result->email);
                $request->session()->put('admin_name',$result->name);


                return redirect('/dashboard');

            }else{
                Session::flash('message', 'Password is Incorrect');
                return redirect('/admin');
            }
        }else{
            Session::flash('message', 'email is not found');
            return redirect('/admin');
        }



    }

    public function logout(){


        session()->forget('admin_login');
        session()->forget('admin_id');
        session()->forget('admin_email');
        session()->forget('admin_name');

        return redirect('/admin');
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(admin $admin)
    {

    }


    public function edit(admin $admin)
    {

    }


    public function update(Request $request, admin $admin)
    {

    }


    public function destroy(admin $admin)
    {

    }
}
