<?php
    namespace app\libraries;
    /*
     * Base Controller
     * Loads the views
     */
    class Controller{

        public function view($view, $inc = true,  $data = []){
            if ($data) extract($data);
            if(file_exists('app/views/' .$view. '.php')){
                if ($inc) {
                    include APPROOT . '/views/inc/header.php';
                }
                require_once 'app/views/' .$view. '.php';
                if ($inc) {
                    include APPROOT . '/views/inc/footer.php';
                }
            } else{
                die('View does not exist');
            }
            $this->clearFlash();
        }
        public function redirect($url, $data = []){
            foreach ($data as $k => $v){
                if ($v != ''){
                    $_SESSION['flash']["$k"] = $v;
                }
            }
            header("Location: $url");
        }


        //Clear Data from Registration
        public function clearFlash()
        {
            unset( $_SESSION['flash']);
        }
    }