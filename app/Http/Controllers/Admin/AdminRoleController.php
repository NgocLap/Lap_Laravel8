<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function show()
    {
        $roles = $this->role->latest()->paginate(10);
        return view('admin.role.show', compact('roles'));
    }

    public function create()
    {
        return view ('admin.role.add');
    }

    // public function store(SettingRequest $request)
    // {
    //     $this->setting->create([
    //         'config_key' => $request -> config_key,
    //         'config_value' => $request -> config_value,
    //         'type' => $request -> type,
    //     ]);
    //     return redirect()->route('show_setting');
    // }
}
