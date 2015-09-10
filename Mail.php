<?php 

namespace thom855j\php_email ; 

class Mail
{ 

    public 
            $Header , 
            $From , 
            $Address , 
            $Subject , 
            $Body ; 

    public 
            function addAddress( $email ) 
    { 
        $this->Address = $email ; 
    } 

    public 
            function subject( $subject ) 
    { 
        $this->Subject = $subject ; 
    } 

    public 
            function body( $template ) 
    { 
        $this->Body = $template ; 
    } 

    public 
            function send() 
    { 
        $this->Header = "From: $this->From \r\n" ; 
        $this->Header .= "Content-Type: text/html; charset=UTF-8\r\n" ; 
        $this->Header .= "Reply-To: $this->From \r\n" ; 

        mail( $this->Address , $this->Subject , $this->Body , $this->Header ) ; 
    } 

} 
