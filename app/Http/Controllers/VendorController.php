<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $query = Vendor::with('user')->paginate(20); 

        return response()->json([
            'message' => 'Vendors fetched successfully.',
            'data' => $query,
        ]);
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            return response()->json([
                'message' => 'Vendor not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Vendor retrieved successfully.',
            'data' => $vendor,
        ]);
    }

public function store(Request $request)
{
    $request->validate([
        'shop_name' => 'nullable|string',
        'shop_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5048',
    ]);

    $data = $request->all();

    if ($request->hasFile('shop_image')) {
        $file = $request->file('shop_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('vendors', $filename, 'public');
        $data['shop_image'] = $path;
    }

    $vendor = Vendor::create($data);

    return response()->json([
        'message' => 'Vendor created successfully.',
        'data' => $vendor,
    ], 201);
}


    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            return response()->json([
                'message' => 'Vendor not found.',
            ], 404);
        }

        $vendor->update($request->all());
        return response()->json([
            'message' => 'Vendor updated successfully.',
            'data' => $vendor,
        ]);
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            return response()->json([
                'message' => 'Vendor not found.',
            ], 404);
        }

        $vendor->delete();
        return response()->json([
            'message' => 'Vendor deleted successfully.',
        ]);
    }
}
