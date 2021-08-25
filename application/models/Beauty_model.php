<?php

class Beauty_model extends CI_Model
{

    public function getAllHairTreat()
    {
        return $this->db->query("Select * from productbeauty where tipe_product = 'hair'")->result_array();
    }
    public function getAllFacialTreat()
    {
        return $this->db->query("Select * from productbeauty where tipe_product = 'facial'")->result_array();
    }
    public function getAllNailsTreat()
    {
        return $this->db->query("Select * from productbeauty where tipe_product = 'nails'")->result_array();
    }

    public function getProduct($id)
    {

        $query = $this->db->select("*")
            ->from('productbeauty')
            ->where('id_pjasa', $id)
            ->get();

        return $query->result_array();
    }

    public function getProductSearch($id, $search)
    {

        $query = $this->db->select("*")
            ->from('productbeauty')
            ->where('id_pjasa', $id)
            ->like('desc_beauty', $search)
            ->get();

        return $query->result_array();
    }

    public function getProduct2($id)
    {

        $query = $this->db->select("*")
            ->from('productbeauty')
            ->where('id_beauty', $id)
            ->get();

        return $query->result_array();
    }

    public function getCheckout($id)
    {

        $query = $this->db->query("SELECT * FROM transaksi_beauty tb join productbeauty pb using(id_beauty) where id_user = $id order by id_orderbeauty DESC limit 1");

        return $query->result_array();
    }

    public function getInvoiceBeauty($id_order)
    {
        $query = $this->db->query("SELECT * FROM transaksi_beauty tb join productbeauty pb using(id_beauty) where id_orderbeauty = $id_order");

        return $query->result_array();

    }

    public function getRating()
    {
        $query = $this->db->query("SELECT *, avg(rating) avg FROM `transaksi_beauty` tc RIGHT JOIN productbeauty pd using (id_beauty) JOIN user u on(u.id = pd.id_pjasa) WHERE role_id = 'Beauty' GROUP by id_pjasa");

        return $query->result_array();
    }
}