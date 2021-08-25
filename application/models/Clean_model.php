<?php

class Clean_model extends CI_Model
{

    public function getAllCleanHome()
    {
        return $this->db->query("Select * from productclean where tipe_product = 'home'")->result_array();
    }

    public function getAllCleanKost()
    {
        return $this->db->query("Select * from productclean where tipe_product = 'kost'")->result_array();
    }

    public function getAllCleanApartment()
    {
        return $this->db->query("Select * from productclean where tipe_product = 'apartment'")->result_array();
    }

    public function getProduct($id)
    {

        $query = $this->db->select("*")
            ->from('productclean')
            ->where('id_pjasa', $id)
            ->get();

        return $query->result_array();
    }

    public function getProductSearch($id, $search)
    {

        $query = $this->db->select("*")
            ->from('productclean')
            ->where('id_pjasa', $id)
            ->like('desc_clean', $search)
            ->get();

        return $query->result_array();
    }

    public function getProduct2($id)
    {

        $query = $this->db->select("*")
            ->from('productclean')
            ->where('id_clean', $id)
            ->get();

        return $query->result_array();
    }

    public function getCheckout($id)
    {

        $query = $this->db->query("SELECT * FROM transaksi_clean tc join productclean pc using(id_clean) where id_user = $id order by id_orderclean DESC limit 1");

        return $query->result_array();
    }

    public function getInvoiceBeauty($id_order)
    {
        $query = $this->db->query("SELECT * FROM transaksi_clean tb join productclean pb using(id_clean) where id_orderclean = $id_order");

        return $query->result_array();

    }

    public function getRating()
    {
        $query = $this->db->query("SELECT *, avg(rating) avg FROM `transaksi_clean` tc RIGHT JOIN productclean pd using (id_clean) JOIN user u on(u.id = pd.id_pjasa) WHERE role_id = 'Clean' GROUP by id_pjasa ORDER BY id_pjasa DESC");

        return $query->result_array();
    }
}