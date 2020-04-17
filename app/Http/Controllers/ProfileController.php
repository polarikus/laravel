<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();
        $errors = [];

        if ($request->isMethod('post')) {
            if (Hash::check($request->post('password'), $user->password)) {
                if ($request->post('passwordNew') != null){
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email'),
                        'password' => Hash::make($request->post('passwordNew'))
                    ]);
                }else{
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email')
                    ]);
                }
                $user->save();

                $request->session()->flash('success', 'Данные успешно изменены!');
            } else {
                $errors['password'][] = 'Не верно введён текущий пароль!';
            }

            return redirect()->route('updateProfile')->withErrors($errors);
        }

        return view('profile', [
            'user' => $user
        ]);
    }
}
