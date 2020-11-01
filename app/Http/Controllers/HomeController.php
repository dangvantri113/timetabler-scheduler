<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [];
        if (session('isLogin') === true) {
            return redirect('/admin/dashboard');
        }
        $data['title'] = 'Home';
        return view('home', $data);
    }


    public function search(Request $request)
    {
        $data = [];
        $data['title'] = 'Home';
        return view('home', $data);
    }
}
