<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visakh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->model('visakh_model');
        /*
        Loading URL helper to enable base_url() function
        Set
        $config['base_url'] = 'http://localhost/codeigniter/';
        in config.php in config folder
         */
        $this->load->helper('url');

        //Loading session library to use session class
        $this->load->library(['session', 'pagination']);
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
            redirect(base_url('visakh/display'));
        }
        $this->load->view('head');
        $this->load->view('register');
    }

    public function display()
    {
        $this->data['search'] = $this->input->get('search');
        $this->data['rows'] = $this->visakh_model->getAllRows($this->data['search']);
        //Displaying flash data from register() and edit()
        echo '<h4>' . $this->session->flashdata('msg') . '</h4>';
        $this->load->view('head');
        $this->load->view('display', $this->data);
    }

    public function display_pagination($page = 0)
    {
        $this->data['search'] = $this->input->get('search');
        
        $config['base_url'] = base_url('visakh/display_pagination/');
        $config['total_rows'] = $this->visakh_model->getAllEntryCount();
        $config['per_page'] = 3;

        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['rows'] = $this->visakh_model->getAllRows2($page, $config['per_page']);
        //Displaying flash data from register() and edit()
        echo '<h4>' . $this->session->flashdata('msg') . '</h4>';
        $this->load->view('head');
        $this->load->view('display_pagination', $this->data);
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
            redirect(base_url('visakh/display'));
        }
        $this->data['row'] = $this->visakh_model->getRowByID($id);
        $this->load->view('head');
        $this->load->view('edit', $this->data);

    }

    public function delete($id = null)
    {
        $this->visakh_model->deleteFromMyTable($id);
        //Setting message as flash data
        $this->session->set_flashdata('msg', 'Deleted Successfully!');
        //Redirecting to display page
        redirect(base_url('visakh/display'));
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
                redirect(base_url('visakh/home'));
            } else {
                echo '<h3>Incorrect login</h3>';
            }
        }
        $this->load->view('login');
    }

    public function home()
    {
        //Display flash data
        echo '<h3>' . $this->session->flashdata('login_msg') . '</h3>';
        if ($this->session->id) {
            $this->data['user'] = array(
                'id' => $this->session->id,
                'name' => $this->session->name,
                'username' => $this->session->username,
            );
            $this->load->view('head');
            $this->load->view('home', $this->data);
        } else {
            redirect(base_url('visakh/login'));
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('visakh/login'));
    }
}
