<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (User::where('username', $data['username'])->exists()) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'username' => ['Username already registered']
                ]
            ], 400));
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function login(UserLoginRequest $request): UserResource
    {
        $data = $request->validated();

        $user = User::where('username', $data['username'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'message' => ['Username or password wrong']
                ]
            ], 401));
        }

        return new UserResource($user);
    }

    /**
     * Get the authenticated user.
     *
     * @param  Request  $request
     * @return UserResource
     */
    public function get(Request $request): UserResource
    {
        $user = $request->user();
        return new UserResource($user);
    }

    /**
     * Update the authenticated user's information.
     *
     * @param  UserUpdateRequest  $request
     * @return UserResource
     */
    public function update(UserUpdateRequest $request): UserResource
    {
        $data = $request->validated();
        $user = $request->user();

        if ($user instanceof User) {
            if (isset($data['name'])) {
                $user->name = $data['name'];
            }

            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }

            $user->save();

            return new UserResource($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Logout the authenticated user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}