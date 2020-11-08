<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
    }

    public function index(){
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            ]);
        $data = [];
        $data['title'] = 'Admin Dashboard';
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.dashboard', $data);
    }

    public function show()
    {
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'add-admin' => '/admin/add-admin'
        ]);
        $data = [];
        $data['title'] = 'Add Admin';
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.admins', $data);
    }


    public function doAddAdmin(Request $request)
    {
        if (!session('isLogin')) {
            redirect('/');
        }
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'add-admin' => '/admin/add-admin'
        ]);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $data = [];
        $data['title'] = 'Login';
        $data['breadcrumb'] = $this->getBreadcrumb();
        $data['success-message'] = 'Add success';
        return view('admin.admins', $data);
    }
}
