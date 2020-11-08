<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setBreadcrumb([
            'home' => '/',
            'login' => '/login'
        ]);
    }

    public function login()
    {
        $data = [];
        if (session('isLogin') === true) {
            return redirect('/admin/dashboard');
        }
        $data['title'] = 'Login';
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.login', $data);
    }


    public function doLogin(Request $request)
    {
        if (session('isLogin') === true)
        {
            return redirect('/admin/dashboard');
        }
        if($this->checkLogin($request->email, $request->password))
        {
            return redirect('/admin/dashboard');
        }

        return view('admin.login', ['error_login_message'=> 'Login not success']);
    }
    private function checkLogin($email, $password)
    {
        $user = Admin::where('email', $email)->first();

        if (!isset($user))
        {
            return false;
        }

        if(Hash::check($password, $user->password))
        {
            session(['isLogin'=>true]);
            session(['user_login_id'=>$user->id]);

            return true;
        }
    }
}
