<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Properti animals (array)
    private $animals = [
        ['id' => 1, 'name' => 'Kucing', 'type' => 'Mamalia'],
        ['id' => 2, 'name' => 'Anjing', 'type' => 'Mamalia'],
        ['id' => 3, 'name' => 'Burung', 'type' => 'Aves']
    ];

    // Menampilkan seluruh data animals
    public function index()
    {
        return response()->json($this->animals);
    }

    // Menambahkan hewan baru
    public function store(Request $request)
    {
        $newAnimal = [
            'id' => count($this->animals) + 1,
            'name' => $request->input('name'),
            'type' => $request->input('type')
        ];
        array_push($this->animals, $newAnimal);
        return response()->json(['message' => 'Hewan baru berhasil ditambahkan']);
    }

    // Memperbarui data hewan berdasarkan ID
    public function update(Request $request, $id)
    {
        foreach ($this->animals as &$animal) {
            if ($animal['id'] == $id) {
                $animal['name'] = $request->input('name');
                $animal['type'] = $request->input('type');
                return response()->json(['message' => 'Data hewan berhasil diperbarui']);
            }
        }
        return response()->json(['message' => 'Hewan dengan ID ' . $id . ' tidak ditemukan'], 404);
    }

    // Menghapus data hewan berdasarkan ID
    public function destroy($id)
    {
        foreach ($this->animals as $key => $animal) {
            if ($animal['id'] == $id) {
                unset($this->animals[$key]);
                return response()->json(['message' => 'Data hewan dengan ID ' . $id . ' berhasil dihapus']);
            }
        }
        return response()->json(['message' => 'Hewan dengan ID ' . $id . ' tidak ditemukan'], 404);
    }
}
