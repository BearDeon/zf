<?php

namespace Helloworld\Service;

class GreetingService {
    
    public function getGreeting(){
        
        if(date("H") <= 11){
            return "Доброе утро, мир!";
        }else if(date("H") > 11 && date("H") < 17){
            return "Привет, мир!";
        }else{
            return "Добрый вечер, мир!"; 
        }
    }
}