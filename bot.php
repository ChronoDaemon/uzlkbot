<?php
/**
* URL-����� ���� � ��� ������.
*/

$access_token = '208218271840531:054aba57336ff9a75f0a';

$api = 'https://api.telegram.org/bot' . $access_token;

/**
* ������� �������� ����������.
*/

$output = json_decode(file_get_contents('php://input'), TRUE); // ������� ��, ��� �������� ������� ����� � POST-��������� � ���������

$chat_id = $output['message']['chat']['id']; // ������� ������������� ����

$first_name = $output['message']['chat']['first_name']; // ������� ��� �����������

$message = $output['message']['text']; // ������� ��������� �����������

/**
* ������� ������� �� ������������.
* �������� �� ��� �������� � ������ �������
*/
$file = 'people.txt';
// ��������� ���� ��� ��������� ������������� �����������
$current = file_get_contents($file);
// ��������� ������ �������� � ����
$current .= $chat_id;
// ����� ���������� ������� � ����
file_put_contents($file, $current);
switch(strtolower_ru($message)) {

case ('������'):

case ('/hello'):

sendMessage($chat_id, '������, '. $first_name . '! ' . $emoji['preload'] );

   break;

case ('/start'): 

  break;

default:

  sendMessage($chat_id, '����������� �������!' );

  break;

}

/**
* ������� �������� ��������� � ��� sendMessage().
*/

function sendMessage($chat_id, $message) {

file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));

}

/**
* ������� �������� �������� � ������ �������, ����������� ���������
*/

function strtolower_ru($text) {

    $alfavitlover = array('�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�','�');

      $alfavitupper = array('�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�','�');

return str_replace($alfavitupper,$alfavitlover,strtolower($text));

}
?>