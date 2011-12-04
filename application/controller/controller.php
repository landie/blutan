<?php

class Controller {

        public $load;
        public $modell;
        function __construct(){
            $this->load = new Load();
            $this->modell = new Modell();

            $this->home();
        }

        function home(){
            $data = $this->modell->user_info();
            $this->load->view('basic.php', $data);
        }
}
?>
