<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            ]);
        $bloodType = $request['blood_type'];
        $checkBloodType = $this->checkBloodType($bloodType);
        if(!$checkBloodType) {
            $errors = 'Wrong Blood Type'; // Here I get $error with fillied data
            return redirect('/user/create')
                ->withErrors($errors)
                ->withInput();
        }

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => str_random(10),
            'token' => str_random(25),
            'blood_type' => $request->blood_type,
            'date_of_birth' => $request->date_of_birth,
        );

        // Mail::send('mails.confirmationpass',$data, function($message) use($data) {
        //     $message->to($data['email']);
        //     $message->subject('Regestration Confirmation');
        // });

        $user = new User();
        $user::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'blood_type' => $request->blood_type,
            'date_of_birth' => $request->date_of_birth,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => $data['token'],
        ]);
        return redirect('/users')->with('success', 'User Created');
    }

    private function checkBloodType(string $bloodType)
    {
        $bloodTypes = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-');
        foreach ($bloodTypes as $value) {
            if($bloodType == $value) {
                return true;
            }
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $bloodTypes = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-');
        $data = array(
            "user" => $user,
            "bloodTypes" => $bloodTypes,
        );
        return view('admin.users.user')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        echo $id;
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
