<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactSearchRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\ContactGetRequest;
use App\Http\Requests\ContactRemoveRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(ContactCreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $contact = Contact::create($data);
        return response()->json(new ContactResource($contact), 201);
    }

    public function search(ContactSearchRequest $request): JsonResponse
    {
        // Implement search logic here based on request parameters
        $contacts = Contact::all(); // Example: fetching all contacts
        return response()->json(ContactResource::collection($contacts));
    }

    public function update(ContactUpdateRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return response()->json(new ContactResource($contact));
    }

    public function get(ContactGetRequest $request, $id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        return response()->json(new ContactResource($contact));
    }

    public function remove(ContactRemoveRequest $request, $id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['data' => true]);
    }
}
