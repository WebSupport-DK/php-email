<?php

namespace thom855j\PHPEmail;

use thom855j\PHPEmail\Mail,
    thom855j\PHPEmail\MailWrapper;
use PHPMailer;
use SMTP;

class Email
{

    // object instance
    private static
            $_instance = null;
    public
            $from,
            $to,
            $subject,
            $template,
            $data              = array();

    public
            function __construct($db)
    {
        parent::__construct($db);
    }

    /*
     * Instantiate object
     */

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Email($params);
        }
        return self::$_instance;
    }

    public
            function send($smtp = false)
    {

        if (!$smtp)
        {
            $mailer = new Mail();

            $mailer->From = $this->from;

            $mail = new MailWrapper($mailer);

            $callback = function($message)
            {
                $message->to($this->to);
                $message->subject($this->subject);
            };
            // send email
            $mail->send($this->template, $this->data, $callback);
        }
    }

}
