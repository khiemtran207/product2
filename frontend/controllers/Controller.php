<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 2/21/2022
 * Time: 9:40 PM
 */
    class Controller{
        public $error;
        public $content;
        public $page_title;

        public function render($file, $variable = []){
            extract($variable);
            ob_start();
            require_once $file;
            return ob_get_clean();
        }
    }