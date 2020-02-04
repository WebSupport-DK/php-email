<?php

namespace PHP\Mailer;

use PHP\Mailer\Mail;
use PHP\Mailer\MailWrapper;
use PHPMailer;
use SMTP;

class Email
{

    public $from;
    public $to;
    public $subject;
    public $template;
    public $data = array();

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function send($smtp = false)
    {
        if (!$smtp) {
            $mailer = new Mail();

            $mailer->From = $this->from;

            $mail = new MailWrapper($mailer);

            $callback = function ($message) {
                $message->to($this->to);
                $message->subject($this->subject);
            };
            
            // send email
            $mail->send($this->template, $this->data, $callback);
        }
    }
}
