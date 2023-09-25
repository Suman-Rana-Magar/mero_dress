<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image' => 'required|file',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);
        // dd($validated['name']);
        $user = new User();
        // dd($user);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->profile = $validated['image'];
        $user->password = Hash::make($validated['password']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = "customers";
            // $fileName = time().$file->getClientOriginalName();
            $file->store($path);

            $url = $path . '/' . $file->hashName();
            $user->profile = $url;
        }
        $user->save();
        if ($user->save()) {
            return response()->json([
                'success' => 'User Created successfully with details:',
                $user,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Unable to create user',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json([
                'error' => 'unable to find user with id ' . $user->id,
            ], 404);
        }
        return response()->json([
            $user,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->email == $request->email) {

                // dd('HERE');
                $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'profile' => 'required|file',
                ]);
                $user->name = $validated['name'];
                $user->email = $validated['email'];
                $user->profile = $validated['profile'];

                if ($request->hasFile('profile')) {
                    $file = $request->file('profile');
                    $path = "users";
                    // $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->store($path);
                    $url = $path . '/' . $file->hashName();

                    $user->profile = $url;
                }
                $user->update();
                return response()->json([
                    'success' => 'User with id ' . $id . ' updated successfully!',
                ], 200);
            } else {

                $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'profile' => 'required|file',
                ]);
                // dd($request->all());

                $user->name = $validated['name'];
                $user->email = $validated['email'];
                $user->profile = $validated['profile'];

                if ($request->hasFile('profile')) {
                    $file = $request->file('profile');
                    $path = "users";
                    // $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->store($path);
                    $url = $path . '/' . $file->hashName();

                    $user->profile = $url;
                }
                $user->update();
                return response()->json([
                    'success' => 'User with id ' . $id . ' updated successfully!',
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Couldn\'t find the user with id ' . $id,
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json([
                'error' => 'unable to find user with id ' . $id,
            ], 404);
        }
        $user->delete();
        return response()->json([
            'success' => 'User with id ' . $id . ' deleted successfully',
        ], 202);
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(!Auth::attempt($validated))
        {
            return response()->json([
                'error' => 'Incorrect email or password ',
            ]);
        }
        return response()->json([
            'success' => 'You are logged in successfully !',
        ]);
    }

    public function logout()
    {
        if(!Auth::user())
        {
            return response()->json([
                'error' => 'Login first in order to logout',
            ]);
        }
        return response()->json([
            'success' => 'You have loggoud successfully !',
        ]);
    }

    public function resetPassword(Request $request,$id)
    {
        $user = User::find($id);
        if(empty($user))
        {
            return response()->json([
                'error' => 'No user found with id '.$id,
            ],404);
        }
        $validate = $request->validate([
            'email' => 'required|email',
        ]);
        if(!$user->email == $validate['email'])
        {
            return response()->json([
                'error' => 'No such email found !',
            ],404);
        }
        
    }
}