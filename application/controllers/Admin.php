<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load image model
        $this->load->model('Client');
        $this->load->model('Portofolio');
        // Cek session
        $this->_cek_session();
    }

    private function _cek_session()
    {
        if ($this->session->userdata('email')) {
            return true;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please log in again</div>');
            redirect('Auth');
        }
    }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/templates/navbar', $data);
        $this->load->view('Admin/templates/sidebar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('Admin/templates/footer');
	}

	public function client()
	{
        // judul 
        $data['title'] = 'Client';
        // mengambil data user berdasarkan email yang sudah login
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jlhdata'] = $this->Client->getData()->num_rows(); 
        // Konfigurasi pagination
        $config['base_url'] = base_url().'/Admin/client';
        $config['total_rows'] = $data['jlhdata'];
        $config['per_page'] = 5;
        $config['num_links'] = 3;

        $config['full_tag_open'] = '<nav ><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = ' <li class="page-item active" aria-current="page"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $from = $this->uri->segment(3);
	    $data['link'] = $this->pagination->create_links();
        
        // Menampilkan data
		$data['infoclient'] = $this->Client->getDataAll($config['per_page'],$from);
        
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/templates/navbar', $data);
        $this->load->view('Admin/templates/sidebar', $data);
        $this->load->view('Admin/client', $data);
        $this->load->view('Admin/templates/footer');
	}

	public function addClient()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Add File <strong>FAILL</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
            redirect('Admin/client');

        } else {
		 //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = 'assets/img/client/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $image = $this->upload->data('file_name');

                } else {
                    echo $this->upload->display_errors();
                }

            $data = [
                'name' => $this->input->post('name', true),
                'image' => $image,
            ];

            $this->Client->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Add File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                                                    
													redirect('Admin/client');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Add File <strong>FAILL</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                                                    
                                                    redirect('Admin/client');
                                                    
            }
		}
	}
    
    public function editClient($id)
    {
       $this->form_validation->set_rules('name', 'Name', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Edit File <strong>FAILL</strong> Validation.
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
            redirect('Admin/client');

        } else {
            // Time
            $current_datetime = date('Y-m-d H:i:s');
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = 'assets/img/client';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $image = $this->upload->data('file_name');

                } else {
                    echo $this->upload->display_errors();
                }
                $data = [
                    'name' => $this->input->post('name', true),
                    'image' => $image,
			        'modified' =>  $current_datetime,
                ];
                
                // Delete file directory
                $data_image = $this->Client->get_id($id);
                unlink('assets/img/client/' . $data_image['image']); 
                // Update data 
                $this->Client->edit($id, $data);
                $this->session->set_flashdata('message', 'berhasil');
                redirect('Admin/client');
            } else {
                $data = [
                    'name' => $this->input->post('name', true),
                    'modified' =>  $current_datetime,
                ];
                // Update data 
                $this->Client->edit($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Add File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                redirect('Admin/client');
            }
        }
    }

	public function deleteClient($id)
    {
        // Delete file directory
        $data_image = $this->Client->get_id($id);
        unlink('assets/img/client/' . $data_image['image']); 
        $this->Client->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Delete File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
        redirect('Admin/client');

    }

	public function portofolio()
	{
        // judul 
        $data['title'] = 'Portofolio';
        // mengambil data user berdasarkan email yang sudah login
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jlhdata'] = $this->Portofolio->getData()->num_rows(); 
        // Konfigurasi pagination
        $config['base_url'] = base_url().'/Admin/portofolio';
        $config['total_rows'] = $data['jlhdata'];
        $config['per_page'] = 5;
        $config['num_links'] = 3;

        $config['full_tag_open'] = '<nav ><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = ' <li class="page-item active" aria-current="page"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $from = $this->uri->segment(3);
	    $data['link'] = $this->pagination->create_links();
        
        // Menampilkan data
		$data['infoportofolio'] = $this->Portofolio->getDataAll($config['per_page'],$from);
        
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/templates/navbar', $data);
        $this->load->view('Admin/templates/sidebar', $data);
        $this->load->view('Admin/portofolio', $data);
        $this->load->view('Admin/templates/footer');
	}

	public function addPortofolio()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Add File <strong>FAILL</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
            redirect('Admin/portofolio');

        } else {
		 //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = 'assets/img/portofolio/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $image = $this->upload->data('file_name');

                } else {
                    echo $this->upload->display_errors();
                }

            $data = [
                'name' => $this->input->post('name', true),
                'category' => $this->input->post('category', true),
                'image' => $image,
            ];

            $this->Portofolio->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Add File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                                                    
													redirect('Admin/portofolio');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Add File <strong>FAILL</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                                                    
                                                    redirect('Admin/portofolio');
                                                    
            }
		}
	}
    
    public function editPortofolio($id)
    {
       $this->form_validation->set_rules('name', 'Name', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Edit File <strong>FAILL</strong> Validation.
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
            redirect('Admin/portofolio');

        } else {
            // Time
            $current_datetime = date('Y-m-d H:i:s');
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = 'assets/img/portofolio';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $image = $this->upload->data('file_name');

                } else {
                    echo $this->upload->display_errors();
                }
                $data = [
                    'name' => $this->input->post('name', true),
                    'category' => $this->input->post('category', true),
                    'image' => $image,
			        'modified' =>  $current_datetime,
                ];
                
                // Delete file directory
                $data_image = $this->Portofolio->get_id($id);
                unlink('assets/img/portofolio/' . $data_image['image']); 
                // Update data 
                $this->Portofolio->edit($id, $data);
                $this->session->set_flashdata('message', 'berhasil');
                redirect('Admin/portofolio');
            } else {
                $data = [
                    'name' => $this->input->post('name', true),
                    'category' => $this->input->post('category', true),
                    'modified' =>  $current_datetime,
                ];
                // Update data 
                $this->Portofolio->edit($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Add File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
                redirect('Admin/portofolio');
            }
        }
    }

	public function deletePortofolio($id)
    {
        // Delete file directory
        $data_image = $this->Portofolio->get_id($id);
        unlink('assets/img/portofolio/' . $data_image['image']); 
        $this->Portofolio->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Delete File <strong>SUCCESS</strong> .
                                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>');
        redirect('Admin/portofolio');

    }
}