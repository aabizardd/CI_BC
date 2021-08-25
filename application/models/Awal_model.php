<?php

/**
 *
 */
class Awal_model extends CI_Model
{

    public function getHistory($id, $tipe)
    {
        $query = $this->db->select("*")
            ->from('product' . $tipe . ' pd')
            ->join('transaksi_' . $tipe . ' tc', 'id_' . $tipe . '')
            ->join('user u', 'tc.id_user=u.id')
            ->where('tc.id_user', $id)
            ->where_not_in('status', [0, 4])
            ->get();
        return $query->result_array();
    }

    public function getPesananOnProgress($id, $tipe)
    {
        $query = $this->db->select("*")
            ->from('product' . $tipe . ' pd')
            ->join('transaksi_' . $tipe . ' tc', 'id_' . $tipe . '')
            ->join('user u', 'tc.id_user=u.id')
            ->where('tc.id_user', $id)
            ->where_in('status', [0, 4])
            ->get();
        return $query->result_array();

    }

    public function getDataUserById($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));

        return $query->result_array();
    }

    public function updUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}