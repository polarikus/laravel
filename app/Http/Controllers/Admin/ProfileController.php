<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //TODO $errors['password'][] = 'Не верно введён текущий пароль!'; формирует только одну ошибку, но в этом массиве валидатор должен еще и свои добавлять, именно поэтому мы добавили значение в этот массив.
    public function update(Request $request, User $user)
    {
        $users = User::query()->paginate(1);
        if ($request->isMethod('post')) {
            $is_admin = null;
            if ($request->post('is_admin') == 'on') {
                $is_admin = true;
            }else{
                $is_admin = false;
            }

            $user->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'is_admin' => $is_admin
            ]);
            $user->save();

            $request->session()->flash('success', 'Данные успешно изменены!');

            return redirect()->route('admin.userShow')->withErrors($errors = 'Неизвестная ошибка');
        }

        return view('admin.profile', [
            'users' => $users
        ]);
    }
}
