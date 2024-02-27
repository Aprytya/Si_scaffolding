<?php 

 class M_sewa extends CI_Model{
 	public function get_data($table)
 	{
 		return $this->db->get($table);
 	}

 	public function get_where($where,$table)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	public function insert_data($data,$table)
 	{
 		$this->db->insert($table,$data);
 	}

 	public function update_data($table,$data,$where){
		$this->db->update( $table, $data, $where);
	}

	public function ambil_id_barang($id)
	{
		$hasil=$this->db->where('id_barang',$id)->get('barang');
		if ($hasil ->num_rows()>0) {
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function ambil_id_penyewa($id)
	{
		$hasil=$this->db->where('id_penyewa',$id)->get('penyewa');
		if ($hasil ->num_rows()>0) {
			return $hasil->result();
		}else{
			return false;
		}

	}

	
	public function update_password($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	public function getCount(){
		return $this->db->count_all('barang');
	}

	public function getList(){
		return $query = $this->db->order_by('id_barang','ASC')->get('barang')->result();
	}

	public function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cek_login(){
		$username=set_value('username');
		$password=set_value('password');

	$result = $this->db->where('username',$username)
					  ->where('password',md5($password))
					  ->limit(1)
					  ->get('penyewa');
	if ($result->num_rows()> 0) {
		return $result->row();
	}else{
		return false;
	}}

	public function cek_login_admin(){
		$username=set_value('username');
		$password=set_value('password');

	$result = $this->db->where('username',$username)
					  ->where('password',md5($password))
					  ->limit(1)
					  ->get('admin');
	if ($result->num_rows()> 0) {
		return $result->row();
	}else{
		return false;
	}}

	public function lihat_stok()
	{
		$query = $this->db->get_where('barang', 'stok > 1');
		return $query->result();
	}

	public function lihat_nama_barang($nama_barang){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get('barang');
		return $query->row();
	}

	public function tambah($data, $table){
		return $this->db->insert_batch('detail_transaksi', $data);
	}

	public function min_stok($stok, $nama_barang, $table){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($table);
		return $query;
	}

	public function getpenyewa(){
		return $this->db->where('username', $this->session->userdata('username'))->get('penyewa')->row('nama_penyewa');
	}

	 public function getpnyID(){
        return $this->db->where('username', $this->session->userdata('username'))
                        ->get('penyewa')->row('id_penyewa');
    }

   public function lihat_no_faktur($no_faktur){
		return $this->db->get_where('detail_transaksi', ['no_faktur' => $no_faktur])->result();
	}

	public function downloadpembayaran($id)
	{
		$query=$this->db->get_where('transaksi',array('no_faktur'=>$id));
		return $query->row_array();
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}


}?>