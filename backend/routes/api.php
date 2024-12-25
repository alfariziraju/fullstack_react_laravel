<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



// Route::middleware('auth:sanctum')->group(function () {
   
// });

/**
 * @OA\Get(
 *     path="/api/mahasiswas",
 *     summary="Menampilkan daftar mahasiswa",
 *     description="Mengembalikan semua data mahasiswa",
 *     tags={"Mahasiswa"},
 *     @OA\Response(
 *         response=200,
 *         description="Berhasil mendapatkan daftar mahasiswa",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Mahasiswa"))
 *     )
 * )
 */

Route::get('/mahasiswas', [MahasiswaController::class, 'index']);

/**
 * @OA\Get(
 *     path="/api/mahasiswas/{nim}",
 *     summary="Menampilkan detail mahasiswa",
 *     description="Mengembalikan data mahasiswa berdasarkan NIM",
 *     tags={"Mahasiswa"},
 *     @OA\Parameter(
 *         name="nim",
 *         in="path",
 *         required=true,
 *         description="NIM Mahasiswa",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Berhasil mendapatkan detail mahasiswa",
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Mahasiswa tidak ditemukan"
 *     )
 * )
 */
Route::get('/mahasiswas/{nim}', [MahasiswaController::class, 'show']);

/**
 * @OA\Post(
 *     path="/api/mahasiswas",
 *     summary="Menambahkan mahasiswa baru",
 *     description="Menyimpan data mahasiswa baru ke dalam database",
 *     tags={"Mahasiswa"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Berhasil menambahkan mahasiswa",
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     )
 * )
 */
Route::post('/mahasiswas', [MahasiswaController::class, 'store']);

/**
 * @OA\Put(
 *     path="/api/mahasiswas/{nim}",
 *     summary="Mengupdate data mahasiswa",
 *     description="Mengupdate data mahasiswa berdasarkan NIM",
 *     tags={"Mahasiswa"},
 *     @OA\Parameter(
 *         name="nim",
 *         in="path",
 *         required=true,
 *         description="NIM Mahasiswa",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Berhasil mengupdate data mahasiswa",
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Mahasiswa tidak ditemukan"
 *     )
 * )
 */
Route::put('/mahasiswas/{nim}', [MahasiswaController::class, 'update']);

/**
 * @OA\Delete(
 *     path="/api/mahasiswas/{nim}",
 *     summary="Menghapus data mahasiswa",
 *     description="Menghapus data mahasiswa berdasarkan NIM",
 *     tags={"Mahasiswa"},
 *     @OA\Parameter(
 *         name="nim",
 *         in="path",
 *         required=true,
 *         description="NIM Mahasiswa",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Berhasil menghapus mahasiswa"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Mahasiswa tidak ditemukan"
 *     )
 * )
 */
Route::delete('/mahasiswas/{nim}', [MahasiswaController::class, 'destroy']);