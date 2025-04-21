<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    // List all users (admin-only)
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return User::all();
    }

    // Create a user (admin-only)
    public function store(RegisterRequest $request)
    {
        $this->authorize('create', User::class);

        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    // Show a user
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $user;
    }

    // Update a user
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());
        return response()->json($user);
    }

    // Delete a user (admin-only)
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return response()->noContent();
    }
}
