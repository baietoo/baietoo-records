<?php
# Include the Autoloader (see "Libraries" for install instructions)
require_once(APP_ROOT . '/../vendor/autoload.php');
// require_once 'helpers/email_mg.php';
use Mailgun\Mailgun;

define('PRIVATE_API_KEY','key-5bda46853741ca8990d361ddf134a939');
// key-5bda46853741ca8990d361ddf134a939
define('PUBLIC_API_KEY','key-5bda46853741ca8990d361ddf134a939');
define('API_BASE_URL', 'https://api.mailgun.net/v3/sandbox91d3b430611142f793f3e07d77c21a69.mailgun.org');
define('DOMAIN', "sandbox91d3b430611142f793f3e07d77c21a69.mailgun.org");

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

function readEmails(){
    $emails = array();
    $mg = Mailgun::create(PRIVATE_API_KEY);
    #returns a list of 25 messages
    $queryString = array(
        // 'begin'        => 'Wed, 1 May 2023 09:00:00 -0000',
        // 'ascending'    => 'yes',
        // 'limit'        =>  25,
        // 'pretty'       => 'yes',
        'recipient'    => 'vgnzd@inbox.testmail.app',
        'event'        => 'delivered'
        // 'event'       => 'accepted OR delivered OR failed OR opened OR clicked OR unsubscribed OR complained OR stored' 
    );
    $result = $mg->events()->get(DOMAIN, $queryString);
    $items = $result->getItems();
    for($i = 0; $i < count($items); $i++){
        $storage = $items[$i]->getStorage();        
        $emails[$i]['from'] = $items[$i]->getMessage()['headers']['from'];
        $emails[$i]['subject'] = $items[$i]->getMessage()['headers']['subject'];
        $emails[$i]['body'] = getMessageBody($storage);
    }

    // $item = $emails->getItems()[0];
    // $idMesaj = $item->getMessage()['headers']['message-id'];
    // $deLa = $item->getMessage()['headers']['from'];
    // $subiect = $item->getMessage()['headers']['subject'];
    // var_dump($item->getStorage());
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "https://api.mailgun.net/v3/domains/sandbox91d3b430611142f793f3e07d77c21a69.mailgun.org/messages/$idMesaj");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    // $headers = array();
    // return $result->http_response_body->items;
    return $emails;
}

function getMessageBody($storage){
    // $mg = Mailgun::create(PRIVATE_API_KEY);
    // $queryString = array(
    //     'message-id'        => 'delivered'
    // );
    // $result = $mg->events()->get(DOMAIN, $queryString);
    // $result = $mg->messages()->get(DOMAIN, $message_id);
    // return $result->http_response_body->body;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $storage['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "api:".PRIVATE_API_KEY);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $output = curl_exec($ch);
    $jo = json_decode($output,true);
    curl_close($ch);
    return $jo['body-plain'];
    // return $storage->get('body-html');
}
?>