<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    // +----------------------------------------------------------
    // | TV Shop
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | User Controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function nieuw() {
        $data['title'] = 'Registreren';
        $data['user'] = $this->authex->getUserInfo();
        
        $this->template->call('user_nieuw', $data);
    }

    private function sendmail($to, $id) {
        // Werkt niet ivm geblokkeerde mailserver.
        
        
    }

    public function registreer() {
        $naam = $this->input->post('naam');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $id = $this->authex->register($naam, $email, $password);

        if ($id) {
            $this->sendmail($email, $id);            
            redirect('user/klaar', 'refresh');
        } else {
            redirect('user/bestaat', 'refresh');
        }
    }

    public function activeer($id) {
        $this->authex->activate($id);
        
        $data['title'] = 'Gebruiker geactiveerd';
        $data['user'] = $this->authex->getUserInfo();

        $this->template->call('user_geactiveerd', $data);

    }

    public function bestaat() {
        $data['title'] = 'Gebruiker bestaat al';
        $data['user'] = null;

        $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'user_bestaat', 'footer' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    public function klaar() {
        $data['title'] = 'Registreren';
        $data['user'] = null;

        $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'user_klaar', 'footer' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

}

/* End of file user.php */
/* Location: ./applications/tvshop/controllers/user.php */