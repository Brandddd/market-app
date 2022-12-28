<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

// use Illuminate\Http\Request;

class UserController extends Controller
{

	// ---------- Create ----------
	public function createAnUser(CreateUserRequest $request)
	{
		try {
			DB::beginTransaction();
			$user = new User($request->all());
			$user->save();
			$user->assignRole($request->role);
			DB::commit();
			if ($request->ajax()) return response()->json(['user' => $user], 201);
			return back()->with('success', 'Usuario creado exitosamente.');
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	// ---------- Read ----------
	public function getAllUsers()
	{
		$users = User::get();
		return response()->json(['users' => $users], 200);
	}

	public function showTableUsers()
	{
		$users = $this->getAllUsers()->original['users'];
		$users->load('roles');
		return view('users.index', compact('users'));
	}

	public function getAnUser(User $user)
	{
		$user->load('roles');
		return response()->json(['user' => $user], 200);
	}

	public function getAllRoles()
	{
		$roles = Role::all();
		return response()->json(['roles' => $roles], 200);
	}

	// ---------- Update ----------
	public function updateAnUser(UpdateUserRequest $request, User $user)
	{
		try {
			DB::beginTransaction();

			$allRequest = $request->all();
			if (isset($allRequest['password'])) {
				if (!$allRequest['password']) unset($allRequest['password']);
			}

			$user->update($request->all());
			$user->syncRoles([$request->role]);
			DB::commit();
			if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
			return back()->with('success', 'Usuario editado satisfactoriamente.');
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	// ---------- Delete ----------
	public function deleteAnUser(User $user)
	{
		$user->delete();
		return response()->json([], 204);
	}
}
