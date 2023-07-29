<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:20',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string',
        ], [
            'name.min' => ':min文字以上で入力してください。',
            'name.max' => ':max文字以内で入力してください。',
        ]);
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->update();

        return to_route('mypage')->with('edit_user', 'ユーザー情報を更新しました。');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();

        if(!password_verify($request->input('current_password'), $user->password)) {
            return to_route('mypage')->with('error_confirm', '現在のパスワードが一致しません。');
        }

        $request->validate([
            'password' => 'min:8|string',
        ], [
            'password.min' => ':min文字以上で入力してください。',
        ]);

        if($request->input('password') == $request->input('password_confirm')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage')->with('error_edit_password', '確認用パスワードが一致しません。');
        }

        return to_route('mypage')->with('edit_password', 'パスワードを変更しました。');
    }

    public function confirm()
    {
        return view('users.confirm');
    }

    public function add_deleted_flag(Request $request)
    {
        $user = Auth::user();

        if(!password_verify($request->input('current_password'), $user->password)) {
            return to_route('mypage')->with('error_confirm', '現在のパスワードが一致しません。');
        }

        if($user->deleted_flag) {
            $user->deleted_flag = false;
        } else {
            $user->deleted_flag = true;
        }
        $user->update();

        Auth::logout();

        return redirect()->route('login')->with('delete_user_complete', 'ユーザーを削除しました。');
    }
}
