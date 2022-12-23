<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
// use Illuminate\Http\Request;

class UserController extends Controller
{

	// ---------- Create ----------
	public function createAnUser(CreateUserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		return response()->json(['user' => $user], 201);
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
		return view('users.index', compact('users'));
	}

	public function getAnUser(User $user)
	{
		return response()->json(['user' => $user], 200);
	}

	// ---------- Update ----------
	public function updateAnUser(UpdateUserRequest $request, User $user)
	{
		$user->update($request->all());
		return response()->json(['user' => $user->refresh()], 201);
	}

	// ---------- Delete ----------
	public function deleteAnUser(User $user)
	{
		$user->delete();
		return response()->json([], 204);
	}
}
