<?php

namespace App\Models;

use CodeIgniter\Model;

class PostinganModels extends Model
{
    protected $table            = 'postingan';
    protected $primaryKey       = 'id_postingan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_postingan","id_user","judul","deskripsi","tag","id_gambar"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function update_data($id, $data)
    {
        $query = $this->db->table($this->table)->where('id_postingan', $id)->update($data);
        return $query ;
    }

    public function search($judul)
    {
        $builder = $this->table('postingan');
        $builder->like('judul',$judul);
        return $builder;
    }
}
