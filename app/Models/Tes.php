<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    private static $students = [
        [
            "id" => 1,
            "nis" => "001",
            "nama" => "Vania",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 2,
            "nis" => "002",
            "nama" => "Asyella",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 3,
            "nis" => "003",
            "nama" => "Thea",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 4,
            "nis" => "004",
            "nama" => "Cia",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 5,
            "nis" => "005",
            "nama" => "Inas",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa barat"
        ]
    ];

    public static function all(){
        return collect(self::$students);
    }
}