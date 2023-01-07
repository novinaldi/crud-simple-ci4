<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltamu extends Model
{
    protected $table            = 'tamu1234';
    protected $primaryKey       = 'idtamu1234';
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'namatamu1234', 'gender1234', 'alamat1234',
        'email1234', 'telp1234', 'pass1234', 'deleted_at', 'foto1234'
    ];

    protected $useTimestamps = true;

    public function tampil_cari($cari)
    {
        return $this->table('tamu1234')->where('deleted_at is NULL')->like('namatamu1234', $cari)->orLike('email1234', $cari);
    }
}