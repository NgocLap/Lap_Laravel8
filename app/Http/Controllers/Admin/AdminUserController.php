<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function show()
    {
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.show', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(AddUserRequest $request)
    {
        try{
            DB::beginTransaction();
            $users = $this->user->create([
                'name' => $request->name,
                'email' =>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            $users->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('show_user');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Lỗi : ' . $exception->getMessage() . '-----Line :' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $users = $this->user->find($id);
        $rolesOfUser = $users->roles;
        return view('admin.user.edit', compact('users','roles','rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' =>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('show_user');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Lỗi : ' . $exception->getMessage() . '-----Line :' . $exception->getLine());
        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
