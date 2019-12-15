<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cutionline extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('cutionline_model');
       $this->load->model('login_model');
    }

	// -- Index cutionline
    public function index()
    {
        $data['userlist'] = $this->cutionline_model->get_all_user();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/cutionline_all_list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

	// -- USERTEXT
	// -- Index Usertext
    public function usertext()
    {
        $data['usertext'] = $this->cutionline_model->get_all_text();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/usertext', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    // Get Usertext Answered or Not
    public function usertext_status($status)
    {
        $data['usertext'] = $this->cutionline_model->get_all_text_bystatus($status);
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/usertext_status', $data, TRUE);
        $this->load->view('admin/index', $data);
	}
	
	//-- USERLIST
	// -- Index Userlist
    public function userlist()
    {
        $data['userlist'] = $this->cutionline_model->get_all_user();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/cutionline_all_list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- Update cutionline info
    public function update($no)
    {
		if ($this->session->userdata('role') == 'admin' || check_power(2)) {
			if ($_POST) {
				$data = array(
					'userid' => $_POST['userid'],
					'username' => $_POST['username'],
					'user_email' => $_POST['user_email'],
					'userprivilege' => $_POST['userprivilege']
				);
				$data = $this->security->xss_clean($data);
				$this->cutionline_model->edit_option($data, $no, 'userlist');
				$this->session->set_flashdata('msg', 'Information Updated Successfully');
				redirect(base_url('admin/cutionline/userlist'));
			}

			$data['user'] = $this->cutionline_model->get_single_user_info($no);
			$data['main_content'] = $this->load->view('admin/user/cutionline/cutionline_edit', $data, TRUE);
			$this->load->view('admin/index', $data);
		}
		else{
            redirect(base_url('admin/cutionline/userlist'));
        }     
    }

    
    //-- Change to Admin Only admin user
    public function admin($no) 
    {
		if ($this->session->userdata('role') == 'admin') {
			$data = array(
				'userprivilege' => "admin"
			);
			$data = $this->security->xss_clean($data);
			$this->cutionline_model->update($data, $no,'userlist');
			$this->session->set_flashdata('msg', 'User active Successfully');
			redirect(base_url('admin/cutionline/userlist'));
		}
		else{
            redirect(base_url('admin/cutionline/userlist'));
        }     
    }

    //-- Change to User Only admin user
    public function user($no) 
    {
		if ($this->session->userdata('role') == 'admin') {
			$data = array(
				'userprivilege' => "user"
			);
			$data = $this->security->xss_clean($data);
			$this->cutionline_model->update($data, $no,'userlist');
			$this->session->set_flashdata('msg', 'User deactive Successfully');
			redirect(base_url('admin/cutionline/userlist'));
		}
		else{
            redirect(base_url('admin/cutionline/userlist'));
        }
    }

    //-- Delete User Only admin user
    public function delete($no)
    {
		if ($this->session->userdata('role') == 'admin' || check_power(3)) {
			$this->cutionline_model->delete($no,'userlist'); 
			$this->session->set_flashdata('msg', 'User deleted Successfully');
			redirect(base_url('admin/cutionline/userlist'));
		}
		else{
            redirect(base_url('admin/cutionline/userlist'));
        }
	}
	
	//-- COMMANDS
	// -- Index Commandlist
    public function command()
    {
        $data['usercommand'] = $this->cutionline_model->get_all_command();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/command_list', $data, TRUE);
        $this->load->view('admin/index', $data);
	}

    //-- Add new user by admin or user with role add
    public function addcommand()
    {   
        if ($this->session->userdata('role') == 'admin' || check_power(1)) {
            if ($_POST) {
                $data = array(
                'prefix' => $_POST['prefix'],
                'command' => $_POST['command'],
                'message' => $_POST['message'],
                'create_date' => current_datetime()
            );

                $data = $this->security->xss_clean($data);
            
                //-- check duplicate email
                $command = $this->cutionline_model->check_command($_POST['command']);

                if (empty($command)) {
                    $user_id = $this->cutionline_model->insert($data, 'command');
                    $this->session->set_flashdata('msg', 'Command added Successfully');
                    redirect(base_url('admin/cutionline/command'));
                } else {
                    $this->session->set_flashdata('error_msg', 'Command already exist, try another command');
                    redirect(base_url('admin/cutionline/addcommand'));
                }
            }
            $data['page_title'] = 'Command Add';
            $data['main_content'] = $this->load->view('admin/user/cutionline/command_add', $data, TRUE);
            $this->load->view('admin/index', $data);
        }
        else{
            redirect(base_url('admin/cutionline/command'));
        }
    }

   //-- Update user command info
   public function update_command($no)
   {
	   if ($this->session->userdata('role') == 'admin' || check_power(2)) {
		   if ($_POST) {
			   $data = array(
				   'prefix' => $_POST['prefix'],
				   'message' => $_POST['message'],
				   'command' => $_POST['command']
			   );
			   $data = $this->security->xss_clean($data);
			   $this->cutionline_model->edit_option($data, $no, 'command');
			   $this->session->set_flashdata('msg', 'Information Updated Successfully');
			   redirect(base_url('admin/cutionline/command'));
		   }

		   $data['command'] = $this->cutionline_model->get_single_command_info($no);
		   $data['main_content'] = $this->load->view('admin/user/cutionline/command_edit', $data, TRUE);
		   $this->load->view('admin/index', $data);
	   }
	   else{
		   redirect(base_url('admin/cutionline/command'));
	   }     
   }

	//-- Delete User Only admin user
	public function delete_command($no)
	{
		if ($this->session->userdata('role') == 'admin' || check_power(3)) {
			$this->cutionline_model->delete($no,'command'); 
			$this->session->set_flashdata('msg', 'Command deleted Successfully');
			redirect(base_url('admin/cutionline/command'));
		}
		else{
			redirect(base_url('admin/cutionline/command'));
		}
	}

	//-- KARYAWANS
	// -- Index Karyawanlist
    public function karyawan()
    {
        $data['userkaryawan'] = $this->cutionline_model->get_all_karyawan();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/karyawan_list', $data, TRUE);
        $this->load->view('admin/index', $data);
	}

    //-- Add new user by admin or user with role add
    public function addkaryawan()
    {   
        if ($this->session->userdata('role') == 'admin' || check_power(1)) {
            if ($_POST) {
                $data = array(
                'nbm' => $_POST['nbm'],
                'nama' => $_POST['nama'],
				'gender' => $_POST['gender'],
				'tempat_lhr' => $_POST['tempat_lhr'],
				'tgl_lahir' => $_POST['tgl_lahir'],
				'alamat' => $_POST['alamat'],
				'rt' => $_POST['rt'],
				'rw' => $_POST['rw'],
				'no_hp' => $_POST['no_hp'],
				'devisi' => $_POST['devisi'],
				'jabatan' => $_POST['jabatan']
                // 'create_date' => current_datetime()
            );

                $data = $this->security->xss_clean($data);
            
                //-- check duplicate email
                $karyawan = $this->cutionline_model->check_karyawan($_POST['karyawan']);

                if (empty($karyawan)) {
                    $user_id = $this->cutionline_model->insert($data, 'karyawan');
                    $this->session->set_flashdata('msg', 'Karyawan added Successfully');
                    redirect(base_url('admin/cutionline/karyawan'));
                } else {
                    $this->session->set_flashdata('error_msg', 'Karyawan already exist, try another karyawan');
                    redirect(base_url('admin/cutionline/addkaryawan'));
                }
            }
            $data['page_title'] = 'Karyawan Add';
            $data['main_content'] = $this->load->view('admin/user/cutionline/karyawan_add', $data, TRUE);
            $this->load->view('admin/index', $data);
        }
        else{
            redirect(base_url('admin/cutionline/karyawan'));
        }
    }

   //-- Update karyawan info
   public function update_karyawan($no)
   {
	   if ($this->session->userdata('role') == 'admin' || check_power(2)) {
		   if ($_POST) {
			   $data = array(
                'nbm' => $_POST['nbm'],
                'nama' => $_POST['nama'],
				'gender' => $_POST['gender'],
				'tempat_lhr' => $_POST['tempat_lhr'],
				'tgl_lahir' => $_POST['tgl_lahir'],
				'alamat' => $_POST['alamat'],
				'rt' => $_POST['rt'],
				'rw' => $_POST['rw'],
				'no_hp' => $_POST['no_hp'],
				'devisi' => $_POST['devisi'],
				'jabatan' => $_POST['jabatan']
			   );
			   $data = $this->security->xss_clean($data);
			   $this->cutionline_model->edit_option($data, $no, 'karyawan');
			   $this->session->set_flashdata('msg', 'Information Updated Successfully');
			   redirect(base_url('admin/cutionline/karyawan'));
		   }

		   $data['karyawan'] = $this->cutionline_model->get_single_karyawan_info($no);
		   $data['main_content'] = $this->load->view('admin/user/cutionline/karyawan_edit', $data, TRUE);
		   $this->load->view('admin/index', $data);
	   }
	   else{
		   redirect(base_url('admin/cutionline/karyawan'));
	   }     
   }

	//-- Delete User Only admin user
	public function delete_karyawan($no)
	{
		if ($this->session->userdata('role') == 'admin' || check_power(3)) {
			$this->cutionline_model->delete($no,'karyawan'); 
			$this->session->set_flashdata('msg', 'Karyawan deleted Successfully');
			redirect(base_url('admin/cutionline/karyawan'));
		}
		else{
			redirect(base_url('admin/cutionline/karyawan'));
		}
	}

	//-- CUTIS
	// -- Index Cutilist
    public function cuti()
    {
		$data['usercuti'] = $this->cutionline_model->get_all_cuti();
        $data['count'] = $this->cutionline_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/cutionline/cuti_list', $data, TRUE);
        $this->load->view('admin/index', $data);
	}

    //-- Add new user by admin or user with role add
    public function addcuti()
    {   
        if ($this->session->userdata('role') == 'admin' || check_power(1)) {
            if ($_POST) {
                $data = array(
				'nbm' => $_POST['nbm'],
				'nama' => $_POST['nama'],
				'jabatan' => $_POST['jabatan'],
				'tempat_lahir' => $_POST['tempat_lahir'],
				'tanggal_lahir' => $_POST['tanggal_lahir'],
				'keperluan' => $_POST['keperluan'],
				'tanggal' => $_POST['tanggal'],
				'status' => $_POST['status'],
				'create_date' => current_datetime(),
				'update_date' => current_datetime()
			);
			

			$data = $this->security->xss_clean($data);
            
			//-- check duplicate email
			$cuti = $this->cutionline_model->check_cuti($_POST['cuti']);

			if (empty($cuti)) {
				$user_id = $this->cutionline_model->insert($data, 'cuti');
				$this->session->set_flashdata('msg', 'Cuti added Successfully');
				redirect(base_url('admin/cutionline/cuti'));
			} else {
				$this->session->set_flashdata('error_msg', 'Cuti already exist, try another cuti');
				redirect(base_url('admin/cutionline/addcuti'));
			}
		}
		$data['page_title'] = 'Cuti Add';
		$data['main_content'] = $this->load->view('admin/user/cutionline/cuti_add', $data, TRUE);
		$this->load->view('admin/index', $data);
        }
        else{
            redirect(base_url('admin/cutionline/cuti'));
        }
    }

   //-- Update cuti info
   public function update_cuti($no)
   {
	   if ($this->session->userdata('role') == 'admin' || check_power(2)) {
		   if ($_POST) {
			   $data = array(
				'nbm' => $_POST['nbm'],
				'nama' => $_POST['nama'],
				'jabatan' => $_POST['jabatan'],
				'tempat_lahir' => $_POST['tempat_lahir'],
				'tanggal_lahir' => $_POST['tanggal_lahir'],
				'keperluan' => $_POST['keperluan'],
				'tanggal' => $_POST['tanggal'],
				'status' => $_POST['status'],
				'update_date' => current_datetime()
			   );
			   $data = $this->security->xss_clean($data);
			   $this->cutionline_model->edit_option($data, $no, 'cuti');
			   $this->session->set_flashdata('msg', 'Information Updated Successfully');
			   redirect(base_url('admin/cutionline/cuti'));
		   }

		   $data['cuti'] = $this->cutionline_model->get_single_cuti_info($no);
		   $data['main_content'] = $this->load->view('admin/user/cutionline/cuti_edit', $data, TRUE);
		   $this->load->view('admin/index', $data);
	   }
	   else{
		   redirect(base_url('admin/cutionline/cuti'));
	   }     
   }

	//-- Delete User Only admin user
	public function delete_cuti($no)
	{
		if ($this->session->userdata('role') == 'admin' || check_power(3)) {
			$this->cutionline_model->delete($no,'cuti'); 
			$this->session->set_flashdata('msg', 'Cuti deleted Successfully');
			redirect(base_url('admin/cutionline/cuti'));
		}
		else{
			redirect(base_url('admin/cutionline/cuti'));
		}
	}


}
