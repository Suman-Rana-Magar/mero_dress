<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        $count_user = User::count();
        $count_product = Product::count();
        $count_order = Order::count();
        return view('admin.index',compact('count_user','count_product','count_order'));
    }

    public function products()
    {
        $products = Product::get();
        return view('admin.products', compact('products'));
    }

    public function customers()
    {
        $customers = User::get();
        return view('admin.customers',compact('customers'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('admin.categories',compact('categories'));
    }

    public function switchToAdmin($id)
    {
        $check = User::findOrFail($id);
        if($check)
        {
            $user = User::where('id',"$id")->first();
            $user->role = 'admin';
            $user->update();
            return redirect()->back();
        }
    }

    public function switchToCustomer($id)
    {
        $check = User::findOrFail($id);
        if($check)
        {
            $user = User::where('id',"$id")->first();
            $user->role = 'customer';
            $user->update();
            return redirect()->back();
        }
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($user->email == $request->email)
        {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'profile' => 'required|mimes:jpg,jpeg,png,gif',
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
            return redirect()->route('admin.profile')->with('success','Profile Updated Successfully !');
        }
        
        else
        {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'profile' => 'required|mimes:jpg,jpeg,png,gif',
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
            return redirect()->route('admin.profile')->with('success','Profile Updated Successfully !');
        }
    }

    public function changePassword()
    {
        return view('admin.changePassword');
    }

    public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);
        $user = User::where('id', $id)->first();
        if(!Hash::check($validated['oldPassword'], Auth::user()->password)){
            return back()->withErrors(["oldPassword" => "Old Password Doesn't match!"]);
        }
        $user->password = Hash::make($validated['newPassword']);
        $user->update();
        return redirect()->route('admin.profile')->with("success", "Password changed successfully!");
    }

    public function cancel()
    {
        return redirect()->route('admin.profile');
    }
}
