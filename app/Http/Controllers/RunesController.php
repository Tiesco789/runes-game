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
        // Validação dos dados
        $request->validate([
            'name' => ['required', 'string', Rule::unique('runes', 'name')->ignore($id)],
            'meaning' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        // Buscar a runa ou lançar erro 404
        $rune = Rune::findOrFail($id);

        // Atualizar os campos de nome e significado
        $rune->fill($request->only(['name', 'meaning']));

        // Processar a imagem, se enviada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $rune->image = base64_encode(file_get_contents(storage_path("app/public/{$imagePath}")));
        }

        // Salvar a runa no banco de dados
        $rune->save();

        // Retornar resposta JSON de sucesso
        return response()->json([
            'message' => 'Rune updated successfully',
            'rune' => $rune
        ], 200);
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
