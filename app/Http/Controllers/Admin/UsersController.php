<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function all()
    {
        $users = User::paginate(7);
        return view('admin.users.all', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $user = User::create([
            'name'           => $validatedData['name'],
            'email'          => $validatedData['email'],
            'mobile'         => $validatedData['mobile'],
            'role'           => $validatedData['role']
        ]);
        if ($user)
            return back()->with('success', 'گاربر با موفقیت ساخته شد');
        return back()->with('failed', 'کاربر ساخته نشد، مجددا امتحان کنید.');
    }

    public function update()
    {
    }

    public function edit()
    {
    }

    public function delete(int $user_id)
    {
        $deletedUser  = User::findOrFail($user_id)->delete();
        if ($deletedUser)
            return back()->with('success', "کاربر مورد نظر حذف شد.");
        return back()->with('failed', 'کاربر حذف نشد، مجددا تلاش کنید.');
    }
}
