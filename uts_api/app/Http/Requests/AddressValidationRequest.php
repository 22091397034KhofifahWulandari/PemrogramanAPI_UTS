<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    /**
     * Create a new address.
     *
     * @param  AddressCreateRequest  $request
     * @return JsonResponse
     */
    public function create(AddressCreateRequest $request): JsonResponse
    {
        // Validasi request
        $validatedData = $request->validated();

        // Lakukan operasi penyimpanan data setelah validasi berhasil
        $address = Address::create($validatedData);

        return response()->json($address, 201);
    }

    /**
     * Update an existing address.
     *
     * @param  AddressUpdateRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AddressUpdateRequest $request, $id): JsonResponse
    {
        // Validasi request
        $validatedData = $request->validated();

        // Temukan alamat yang ingin diperbarui
        $address = Address::findOrFail($id);

        // Lakukan operasi pembaruan data setelah validasi berhasil
        $address->update($validatedData);

        return response()->json($address);
    }
}
