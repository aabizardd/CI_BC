<?php
class Pjasa_model extends CI_Model
{

    public function tambahJasaClean($data)
    {
        $this->db->insert('productclean', $data);
    }

    public function getAllProdClean()
    {
        return $this->db->get('productclean')->result_array();
    }

    public function getProductClean()
    {
        return $this->db->get_where('productclean', array('id_clean' => $this->uri->segment('3')))->result_array();
    }

    public function tambahJasaBeauty($data)
    {
        $this->db->insert('productbeauty', $data);
    }

    public function getAllProdBeauty()
    {
        return $this->db->get('productbeauty')->result_array();
    }

    public function getProductBeauty()
    {
        return $this->db->get_where('productbeauty', array('id_beauty' => $this->uri->segment('3')))->result_array();
    }

    public function deleteClean($id)
    {

        $this->db->set('status_aktif', 0);
        $this->db->where('id_clean', $id);
        $this->db->update('productClean');

    }

    public function aktifClean($id)
    {

        $this->db->set('status_aktif', 1);
        $this->db->where('id_clean', $id);
        $this->db->update('productClean');

    }

    public function updateJasaClean($id, $data)
    {
        $this->db->where('id_clean', $id);
        $this->db->update('productclean', $data);
    }

    public function deleteBeauty($id)
    {
        $this->db->set('status_aktif', 0);
        $this->db->where('id_beauty', $id);
        $this->db->update('productbeauty');

    }

    public function aktifBeauty($id)
    {
        $this->db->set('status_aktif', 1);
        $this->db->where('id_beauty', $id);
        $this->db->update('productbeauty');

    }

    public function updateJasaBeauty($id, $data)
    {
        $this->db->where('id_beauty', $id);
        $this->db->update('productbeauty', $data);
    }

    public function getTipeById($tipe, $id)
    {
        $query = $this->db->select("*")
            ->from('user u')
            ->join('product' . $tipe . ' p', 'u.id=p.id_pjasa')
            ->join('transaksi_' . $tipe . ' t', 'id_' . $tipe)
            ->where('p.id_pjasa', $id)
            ->where_not_in('status', [0, 3, 4])
            ->get();
        return $query->result_array();
    }

    public function getPesananMasuk($tipe, $id)
    {
        $query = $this->db->select("*")
            ->from('user u')
            ->join('product' . $tipe . ' p', 'u.id=p.id_pjasa')
            ->join('transaksi_' . $tipe . ' t', 'id_' . $tipe)
            ->where('p.id_pjasa', $id)
            ->where('status', 0)
            ->get();
        return $query->result_array();
    }

    public function getPesananOnProgress($tipe, $id)
    {
        $query = $this->db->select("*")
            ->from('user u')
            ->join('product' . $tipe . ' p', 'u.id=p.id_pjasa')
            ->join('transaksi_' . $tipe . ' t', 'id_' . $tipe)
            ->where('p.id_pjasa', $id)
            ->where('status', 4)
            ->get();
        return $query->result_array();
    }
}
