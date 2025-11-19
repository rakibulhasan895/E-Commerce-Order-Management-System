<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): JsonResponse
    {
        $roles = Role::select('id', 'name')->paginate(20);

        return response()->json([
            'message' => 'Roles fetched successfully.',
            'data' => $roles,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existingRole = Role::where('name', $validated['name'])->first();
        if ($existingRole) {
            return response()->json([
                'message' => 'Role already exists.',
                'data' => $existingRole,
            ]);
        }

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Role created successfully.',
            'data' => $role,
        ]);
    }

    public function update(Request $request, Role $role): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existingRole = Role::where('name', $validated['name'])->first();
        if ($existingRole) {
            return response()->json([
                'message' => 'Role already exists.',
                'data' => $existingRole,
            ]);
        }
        $role->update($validated);

        return response()->json([
            'message' => 'Role updated successfully.',
            'data' => $role,
        ]);
    }

    /**
     * Show a single role.
     */
    public function show(Role $role): JsonResponse
    {
        return response()->json([
            'message' => 'Role retrieved.',
            'data' => [
                'id' => $role->id,
                'name' => $role->name,
            ],
        ]);
    }

    public function destroy(Role $role): JsonResponse
    {
        if (! $role) {
            return response()->json([
                'message' => 'Role not found.',
            ], 404);
        }
        if ($role->users()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete role with associated users.',
            ], 400);
        }
        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully.',
        ]);
    }
}
