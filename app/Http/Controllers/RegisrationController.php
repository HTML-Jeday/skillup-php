<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of RegisrationController
 *
 * @author linux
 */
class RegisrationController extends Controller {
    
    public function index() {
        
        $form = "<form action='/register' method='POST'>"
                . "<input type='text' name='name'>"
                . "<input type='text' name='password'>"
                . "<button>send</button>"
                . "</form>";
        
        die($form);

        
    }
    public function store(\App\Http\Requests\RegisterUserReguest $request) {
        
           die("dwadadada");      
     
    }
    
}
