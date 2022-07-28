<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
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

    public function update(int $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.users.update', compact('user'));
    }

    public function edit(UpdateRequest $request, int $user_id)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($user_id);
        $updatedUser = $user->update([
            'name'           => $validatedData['name'],
            'email'           => $validatedData['email'],
            'mobile'           => $validatedData['mobile'],
            'role'           => $validatedData['role']
        ]);
        if ($updatedUser)
            return back()->with('success', 'کاربر با موفقیت ویرایش شد');
        return back()->with('failed', 'مشکلی پیش آمده، مجددا تلاش کنید.');
    }

    public function delete(int $user_id)
    {
        $deletedUser  = User::findOrFail($user_id)->delete();
        if ($deletedUser)
            return back()->with('success', "کاربر مورد نظر حذف شد.");
        return back()->with('failed', 'کاربر حذف نشد، مجددا تلاش کنید.');
    }
}
