<?php
require_once __DIR__ . '/Base.php';

class Application extends Base {
    public function index() {        
        $twig = $this->twig();

        try {
            echo $twig->render('index.html.twig');
        } catch(Exception $e) { 
            echo $e->getMessage();
        }
    }
}