<?php
class Admin_model extends CI_Model
{

    public function getallUser($where)
    {
        return $this->db->get_where('user', $where)->result_array();

    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getallPjasa()
    {
        return $this->db->get_where('user')->result_array();

    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

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

    public function hapusJasaClean($id)
    {
        $this->db->where('id_clean', $id);
        $this->db->delete('productclean');
    }

    public function updateJasaClean($id, $data)
    {
        $this->db->where('id_clean', $id);
        $this->db->update('productclean', $data);
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
    public function hapusJasaBeauty($id)
    {
        $this->db->where('id_beauty', $id);
        $this->db->delete('productbeauty');
    }

    public function updateJasaBeauty($id, $data)
    {
        $this->db->where('id_beauty', $id);
        $this->db->update('productbeauty', $data);
    }

    public function getAllDataClean()
    {
        $query = $this->db->query("SELECT *, avg(rating) avg FROM `transaksi_clean` tc RIGHT JOIN productclean pd using (id_clean) JOIN user u on(u.id = pd.id_pjasa) WHERE role_id = 'Clean' GROUP by id_pjasa ORDER BY id_pjasa DESC");

        return $query->result_array();
    }

    public function getAllDataBeauty()
    {
        $query = $this->db->query("SELECT *, avg(rating) avg FROM `transaksi_beauty` tc RIGHT JOIN productbeauty pd using (id_beauty) JOIN user u on(u.id = pd.id_pjasa) WHERE role_id = 'Beauty' GROUP by id_pjasa");

        return $query->result_array();
    }

    public function ubahStatusUser($status, $id)
    {
        $this->db->set('is_active', $status);
        $this->db->where('id', $id);
        $this->db->update('user');

    }
}