<?php

namespace Datalaere\PHPEmail;

class Mail
{
    public $Header;
    public $From;
    public $Address;
    public $Subject;
    public $Body;

    public function addAddress($email)
    {
        $this->Address = $email;
    }

    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($template)
    {
        $this->Body = $template;
    }

    public function send()
    {
        $this->Header = "From: $this->From \r\n";
        $this->Header .= "Content-Type: text/html; charset=UTF-8\r\n";
        $this->Header .= "Reply-To: $this->From \r\n";

        return mail($this->Address, $this->Subject, $this->Body, $this->Header);
    }
}
