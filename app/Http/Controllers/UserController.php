<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
// use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Users = User::latest()->paginate(5);
        return view('user.index',compact('Users'))->with('i',(request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
       'name'=>'required',
        'email'=>['required', 'email'],
        'phone'=>'required',
        'password'=>'required',
        ]);
        
       User::create($request->all());
       return redirect()->route('user.index')->with('success','New Student Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $user=User::find($id);
        $user->Create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);
        return view ('user.detail',compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User=User::find($id);
        return view ('user.edit',compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'name'=>'required',
        'email'=>['required', 'email'],
        'phone'=>'required',
        'password'=>'required',
      ]);
      $user=User::find($id);
        $user->Update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);
      return redirect()->route('user.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User=User::find($id);
        $User->delete();
        return redirect()->route('user.index')->with('success','Deleted successfully');
    }
}
