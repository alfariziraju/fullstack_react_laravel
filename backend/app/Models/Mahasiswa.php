<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Mahasiswa",
 *     required={"nim", "nama", "alamat", "tanggal_lahir", "jurusan"},
 *     @OA\Property(property="nim", type="string", example="123456"),
 *     @OA\Property(property="nama", type="string", example="John Doe"),
 *     @OA\Property(property="alamat", type="string", example="Jl. Merdeka No. 1"),
 *     @OA\Property(property="tanggal_lahir", type="string", format="date", example="2000-01-01"),
 *     @OA\Property(property="jurusan", type="string", example="Teknik Informatika")
 * )
 */


class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jurusan',
    ];
}
