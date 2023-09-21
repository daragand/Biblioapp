<?php

require 'classes/Client.php';

if (isset($_GET['cltName'])) {

$suggClients=[];
$suggClients=Client::getClientByName($_GET['cltName']);
echo json_encode($suggClients);
}