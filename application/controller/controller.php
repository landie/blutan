<?php

class Controller {

        public $load;
        public $modell;
        function __construct(){
            $this->load = new Load();
            $this->model = new Model();

            $this->home();
        }

        function home(){
            $data = $this->model->user_info();
            $this->load->view('basic.php', $data);
        }
}
?>
