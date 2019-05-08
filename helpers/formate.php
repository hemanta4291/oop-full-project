
<?php


    class formate{

        public  function formantedate($date){

            return date("F j, Y, g:i a",strtotime($date));
        }

        public function shortdata($body,$limited=400){

            $text = substr($body,0,$limited);
            $text = substr($body,0,strrpos($text," "));
            $text =$text. " ";
            $text =$text.".....";
            return $text;

        }

        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public  function title(){
            $path = $_SERVER['SCRIPT_FILENAME'];
            $title = basename($path,'.php');
            $title = str_replace('_',' ',$title);
            if($title == 'index'){
                $title = 'home';
            }else if($title == 'contact'){
                $title = 'contact';
            }

            return $title = ucwords($title);


        }


    }





?>