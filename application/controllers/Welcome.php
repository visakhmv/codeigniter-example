<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    //Default function

    public function index()
    {
        $this->load->view('welcome_message');
    }

    //Example with printing inside controller
    public function example1()
    {
        echo "Hello world";
    }

    //Example with passing values to view
    public function example2()
    {
        $view['var1'] = "Hello";
        $view['var2'] = " World";

        /* Alternate option
        $view = array(
			'var1' => "Hello",
			'var2' => " World"
        );
         */
        $this->load->view('welcome_example2', $view);
    }
}
