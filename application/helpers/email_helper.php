<?php
function send_email( $to, $subject, $message) {
    $ci = & get_instance();
    $email_config = Array(	  'mailtype' => 'html',            'charset' => 'iso-8859-1',            'newline' => '\r\n',            'crlf' => '\n'
        // 'protocol' => 'smtp',
        // 'smtp_host' => '',
        // 'smtp_port' => 25,
        // 'smtp_user' => '',
        // 'smtp_pass' => '',
        // 'mailtype' => 'html',
        // 'charset' => 'iso-8859-1'
    );
    $ci->load->library('encrypt');
    $ci->load->library('email', $email_config);

    $ci->email->set_newline("\r\n");

    // Set to, from, message, etc.
    $ci->email->from('occsuper@cca.gov.np', 'cca');
    $ci->email->to($to);
//                        $ci->email->reply_to($email, $name);

    $ci->email->subject($subject);

    $ci->email->message($message);

    $ci->email->send();
}
