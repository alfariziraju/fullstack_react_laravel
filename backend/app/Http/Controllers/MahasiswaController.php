<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;


/**
 * @OA\Info(
 *     title="API Mahasiswa",
 *     version="1.0.0",
 *     description="Dokumentasi API untuk sistem mahasiswa",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class MahasiswaController extends Controller
{

    public function index()
    {
        return Mahasiswa::all();
    }

    /**
     * @OA\Get(
     *     path="/api/mahasiswas/{nim}",
     *     summary="Retrieve a single mahasiswa by NIM",
     *     @OA\Parameter(
     *         name="nim",
     *         in="path",
     *         required=true,
     *         description="Nomor Induk Mahasiswa",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mahasiswa detail",
     *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Mahasiswa not found"
     *     )
     * )
     */
    public function show($nim)
    {
        return Mahasiswa::findOrFail($nim);
    }

    /**
     * @OA\Post(
     *     path="/api/mahasiswas",
     *     summary="Create a new mahasiswa",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mahasiswa created successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($validated);
        return response()->json(['message' => 'Mahasiswa created successfully'], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/mahasiswas/{nim}",
     *     summary="Update an existing mahasiswa",
     *     @OA\Parameter(
     *         name="nim",
     *         in="path",
     *         required=true,
     *         description="Nomor Induk Mahasiswa",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mahasiswa updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Mahasiswa not found"
     *     )
     * )
     */
    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required',
        ]);

        $mahasiswa->update($validated);
        return response()->json(['message' => 'Mahasiswa updated successfully']);
    }

    /**
     * @OA\Delete(
     *     path="/api/mahasiswas/{nim}",
     *     summary="Delete a mahasiswa",
     *     @OA\Parameter(
     *         name="nim",
     *         in="path",
     *         required=true,
     *         description="Nomor Induk Mahasiswa",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mahasiswa deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Mahasiswa not found"
     *     )
     * )
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
