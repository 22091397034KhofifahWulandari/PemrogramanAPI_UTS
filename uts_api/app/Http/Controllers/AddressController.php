<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Http\Requests\AddressSearchRequest;
use App\Http\Requests\AddressRemoveRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create(AddressCreateRequest $request, $idContact): JsonResponse
    {
        $data = $request->validated();
        $data['contact_id'] = $idContact; // Menggunakan nilai $idContact yang diterima sebagai contact_id
        $address = Address::create($data);
        return response()->json(new AddressResource($address), 201);
    }    

    public function search(AddressSearchRequest $request): JsonResponse
    {
        // Implement search logic here based on request parameters
        $addresses = Address::all(); // Example: fetching all addresses
        return response()->json(AddressResource::collection($addresses));
    } 

    public function update(AddressUpdateRequest $request, $idAddress): JsonResponse
    {
        $data = $request->validated();
        $address = Address::findOrFail($idAddress);
        $address->update($data);
        return response()->json(new AddressResource($address));
    }    

    public function remove(AddressRemoveRequest $request, $id): JsonResponse
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json(['data' => true]);
    }
    
}
