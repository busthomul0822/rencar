<?php
class Users extends CI_Controller{
    
    
    function dashsboard(){
        $this->template->load('adminTemplate','dashboard');
    }

    function index()
    {
        $this->load->view('login');
    }
    /*
    function login(){
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $pass  = $_POST['password'];
            $chek = $this->db->get_where('users',array('email'=>$email,'password'=>$pass  ));
            if($chek->num_rows()>0)
            {
                //$sess = array('status'=>'login','email'=>$email);
                //$this->session->set_userdata($sess);
                redirect('kendaraan');
            }else{
                $this->load->view('login');
            }
        }else{
                    $this->load->view('login');
        }
    }*/

    function login()
        {
            $this->load->model('M_login');
            $valid_user= $this->M_login->check_user();

            if($valid_user == false){
                $this->session->set_flashdata('error', 'Username / Password tidak cocok');
                redirect('Users');

            }else{
                $this->session->set_userdata( 'login', true );
                $this->session->set_userdata( 'id', $valid_user->id_user );
                $this->session->set_userdata( 'username', $valid_user->username );
                $this->session->set_userdata( 'email', $valid_user->email );
                

                /*if($valid_user->level == '0'){
                    redirect('Dashboard','refresh');
                }else{

                    echo " <script>
                             history.go(-1);
                            </script>";
                }*/
                redirect('kendaraan');


            }
        }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('kendaraan');
    }
}