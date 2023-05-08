<?php
# Include the Autoloader (see "Libraries" for install instructions)
require_once(__DIR__.'/../../vendor/autoload.php');
// require_once 'helpers/email_mg.php';
use Mailgun\Mailgun;

define('PRIVATE_API_KEY','key-5bda46853741ca8990d361ddf134a939');
// key-5bda46853741ca8990d361ddf134a939
define('PUBLIC_API_KEY','key-5bda46853741ca8990d361ddf134a939');
define('API_BASE_URL', 'https://api.mailgun.net/v3/sandbox91d3b430611142f793f3e07d77c21a69.mailgun.org');
define('DOMAIN', "sandbox91d3b430611142f793f3e07d77c21a69.mailgun.org");

# Instantiate the client.
// https://github.com/mailgun/mailgun-php/issues/646


function sendEmail($data){
    $email = $data['email'];
    $body = $data['body'];
    $mg = Mailgun::create(PRIVATE_API_KEY);
    $mg->messages()->send(DOMAIN, [
        'from'    => $email,
        'to'      => 'vgnzd@inbox.testmail.app',
        'subject' => "Contact BaietooRecords from $email",
        'text'    => $body
    ]);
    return true;
}
?>