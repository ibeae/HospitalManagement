<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_user");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Superadmin Name</th>
					<th>Username</th>
					<th>Level</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user."</td>
					<td>".$h->username."</td>
					<td>".$h->level."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/user/edit/".$h->kode_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->kode_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_ruang($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_ruang");

		$config['base_url'] = base_url() . 'admin/ruang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_ruang, b.kategori_ruang, a.status_ruangan, a.id_ruang from dlmbg_ruang a 
		left join dlmbg_kategori_ruang b on a.id_kategori_ruang=b.id_kategori_ruang LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Ruang</th>
					<th>Kategori Ruang</th>
					<th>Status Ruangan</th>
					<th width='150'><a href='".base_url()."admin/ruang/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_ruang."</td>
					<td>".$h->kategori_ruang."</td>
					<td>".$h->status_ruangan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/ruang/edit/".$h->id_ruang."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/ruang/hapus/".$h->id_ruang."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_pasien($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pasien");

		$config['base_url'] = base_url() . 'admin/data_pasien/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.id_pasien, a.nama_pasien, a.tgl_masuk, b.nama_ruang, c.nama_dokter from dlmbg_pasien a left join dlmbg_ruang b on 
		a.id_ruang=b.id_ruang left join dlmbg_dokter c on a.id_dokter=c.id_dokter LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Pasien</th>
					<th>Tgl. Masuk</th>
					<th>Ruang</th>
					<th>Dokter</th>
					<th width='150'><a href='".base_url()."admin/data_pasien/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_pasien."</td>
					<td>".$h->tgl_masuk."</td>
					<td>".$h->nama_ruang."</td>
					<td>".$h->nama_dokter."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/data_pasien/edit/".$h->id_pasien."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/data_pasien/hapus/".$h->id_pasien."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_menu");

		$config['base_url'] = base_url() . 'admin/routing_pages/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_menu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Menu</b></td>
				<td><b>URL Route</b></td>
				<td><b>Posisi</b></td>
				<td width='150'><a href='".base_url()."admin/routing_pages/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->menu." </td><td>".$h->url_route." </td><td>".$h->posisi." </td>
			<td><a href='".base_url()."admin/routing_pages/edit/".$h->id_menu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/routing_pages/hapus/".$h->id_menu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_spesialis($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_spesialis");

		$config['base_url'] = base_url() . 'admin/data_spesialis/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_spesialis",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Spesialis</th>
				<th width='150'><a href='".base_url()."admin/data_spesialis/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->spesialis." </td>
			<td><a href='".base_url()."admin/data_spesialis/edit/".$h->id_spesialis."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_spesialis/hapus/".$h->id_spesialis."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_status($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_status");

		$config['base_url'] = base_url() . 'admin/data_status/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_status",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Status</th>
				<th width='150'><a href='".base_url()."admin/data_status/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->status." </td>
			<td><a href='".base_url()."admin/data_status/edit/".$h->id_status."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_status/hapus/".$h->id_status."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_kategori_ruang($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_kategori_ruang");

		$config['base_url'] = base_url() . 'admin/data_kategori_ruang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_kategori_ruang",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Kategori Ruang</th>
				<th>Biaya Ruang</th>
				<th width='150'><a href='".base_url()."admin/data_kategori_ruang/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->kategori_ruang." </td><td>Rp. ".number_format($h->biaya_ruang,2,',','.')." </td>
			<td><a href='".base_url()."admin/data_kategori_ruang/edit/".$h->id_kategori_ruang."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_kategori_ruang/hapus/".$h->id_kategori_ruang."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_buku_tamu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_buku_tamu");

		$config['base_url'] = base_url() . 'admin/data_buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_buku_tamu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Nama</th>
				<th>Email</th>
				<th width='230'></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$st = 1;
			$st_text = "Unapprove";
			if($h->st==1)
			{
				$st = 0;
				$st_text = "Approve";
			}
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->email." </td>
			<td><a href='".base_url()."admin/data_buku_tamu/approve/".$h->id_buku_tamu."/".$st."' class='btn btn-primary btn-small'>
			<i class='icon-share'></i> ".$st_text."</a>
			<a href='".base_url()."admin/data_buku_tamu/edit/".$h->id_buku_tamu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_buku_tamu/hapus/".$h->id_buku_tamu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_contact($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_contact");

		$config['base_url'] = base_url() . 'admin/data_contact/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_contact",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Email</th>
				<th width='230'></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->telepon." </td><td>".$h->email." </td>
			<td><a href='".base_url()."admin/data_contact/edit/".$h->id_contact."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_contact/hapus/".$h->id_contact."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_galeri($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_galeri");

		$config['base_url'] = base_url() . 'admin/data_galeri/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_galeri",$limit,$offset);
		
		$hasil = "";
		
		$hasil = "<p><a href='".base_url()."admin/data_galeri/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></p>
		<div class='row-fluid'>";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			if($i==0)
			{
				$hasil .= '</ul>';
				$hasil .= '<ul class="thumbnails m-media-container">';
			}
			$hasil .= "<li class='span2'><a href='#' class='thumbnail'>
			<img src='".base_url()."asset/galeri/".$h->gambar."'></a>
			<div class='m-media-action'>
			<a href='".base_url()."admin/data_galeri/edit/".$h->id_galeri."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i></a>
			<a href='".base_url()."admin/data_galeri/hapus/".$h->id_galeri."/".$h->gambar."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i></a></div></li>";
			
			$i++;
			if($i>5)
			{
				$i=0;
			}
		}
		
		$hasil .= '</div>';
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
