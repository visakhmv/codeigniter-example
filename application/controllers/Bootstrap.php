<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootstrap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(['visakh_model', 'bootstrap_model']);
        $this->load->helper('url');
        $this->load->library(['session', 'pagination']);
    }

    public function index()
    {
        //Views inside a common folder
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/footer');
    }

    public function register()
    {
        if (count($_POST) > 0) {
            //id is auto increment so no need to specify
            $row = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            );
            $this->visakh_model->insertToMyTable($row);
            //Setting message as flash data
            $this->session->set_flashdata('msg', 'Registration Success!');
            //Redirecting to display page
            redirect(base_url('bootstrap/display'));
        }
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/register');
        $this->load->view('bootstrap/footer');
    }

    public function edit($id = null)
    {
        if (count($_POST) > 0) {
            $row = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            );
            $this->visakh_model->updateMyTable($id, $row);
            //Setting message as flash data
            $this->session->set_flashdata('msg', 'Updated Successfully!');
            //Redirecting to display page
            redirect(base_url('bootstrap/display'));
        }
        $this->data['row'] = $this->visakh_model->getRowByID($id);
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/edit', $this->data);
        $this->load->view('bootstrap/footer');
    }

    public function delete($id = null)
    {
        $this->visakh_model->deleteFromMyTable($id);
        //Setting message as flash data
        $this->session->set_flashdata('msg', 'Deleted Successfully!');
        //Redirecting to display page
        redirect(base_url('bootstrap/display'));

    }

    public function display()
    {
        $this->data['search'] = $this->input->get('search');
        $this->data['rows'] = $this->visakh_model->getAllRows($this->data['search']);
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/display', $this->data);
        $this->load->view('bootstrap/footer');
    }

    public function login()
    {
        if (count($_POST) > 0) {
            //Sending username from post to check in the table
            $row = $this->visakh_model->checkLogin($this->input->post('username'));

            //If there is a response and the passwords equals then valid login
            if (!empty($row) && $row['password'] == $this->input->post('password')) {
                //Set session values
                $this->session->set_userdata('id', $row['id']);
                $this->session->set_userdata('name', $row['name']);
                $this->session->set_userdata('username', $row['username']);

                //Set flash data to display login messsage
                $this->session->set_flashdata('login_msg', 'Login Success!');
                redirect(base_url('bootstrap/home'));
            } else {
                echo '<h3>Incorrect login</h3>';
            }
        }
        $this->load->view('bootstrap/login');
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('bootstrap/display'));
    }

    public function home()
    {
        $this->data['search'] = $this->input->get('search');
        $this->data['rows'] = $this->visakh_model->getAllRows($this->data['search']);
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/display', $this->data);
        $this->load->view('bootstrap/footer');
    }

    public function country($page = null)
    {
        $this->data['search'] = $this->input->get('search');

        $config['base_url'] = base_url('bootstrap/country/');
        $config['total_rows'] = $this->visakh_model->getAllCountries($this->data['search'], true);
        $config['per_page'] = 30;
        //Bootstrap styling
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        //end
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['rows'] = $this->visakh_model->getAllCountries($this->data['search'], false, $page, $config['per_page']);
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->load->view('bootstrap/header');
        $this->load->view('bootstrap/left-menu');
        $this->load->view('bootstrap/country', $this->data);
        $this->load->view('bootstrap/footer');
    }
}
