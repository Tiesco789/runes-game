<?php

namespace App\Http\Controllers;

use App\Models\Rune;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RunesController extends Controller
{
    public function index(): JsonResponse
    {
        $runes = Rune::all();
        return \response()->json($runes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:runes,name',
            'meaning' => 'required|string',
            'image' => 'nullable|image|max:1024'
        ]);

        $runeImageBase64 = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $runeImageBase64 = base64_encode(file_get_contents(storage_path("app/public/{$imagePath}")));
        }

        $rune = Rune::create([
            'name' => $validated['name'],
            'meaning' => $validated['meaning'],
            'image' => $runeImageBase64
        ]);

        return response()->json([
            'message' => 'Rune add successfully',
            'rune' => $rune,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('runes', 'name')->ignore($id)],
            'meaning' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        $rune = Rune::findOrFail($id);

        $rune->fill($request->only(['name', 'meaning']));

        if ($request->hasFile('image')) {
            $rune->image = $this->storeImage($request->file('image'));
        }

        $rune->save();

        return response()->json([
            'message' => 'Rune updated successfully',
            'rune' => $rune
        ], 200);
    }

    private function storeImage($image): string
    {
        $imagePath = $image->store('images', 'public');
        return base64_encode(file_get_contents(storage_path("app/public/{$imagePath}")));
    }

    public function destroy($id)
    {
        $rune = Rune::find($id);

        if (!$rune) {
            return \response()->json(['message' => 'Rune not found'], 404);
        }

        $rune->delete();

        return \response()->json(['message' => 'Rune deleted successfully'], 200);
    }
}
