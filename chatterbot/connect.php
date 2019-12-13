<?php

try {
$db = new PDO("sqlite:chatterbot/db.sqlite3");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch (Exception $e) {
echo "Unable to connect";
echo $e->getMessage();
}


$result = $db->query('SELECT * from statement WHERE persona like "bot:Charles"');

while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    if(isset($row['in_response_to'])){
    print "<div class='d-flex justify-content-end mb-4' id='resposta'>
      <div class='msg_cotainer_send'>";
    print $row['in_response_to'];
    print "</div></div>";
    }

    if(isset($row['text'])){
    print "<div class='d-flex justify-content-start mb-4'>
    <div class='msg_cotainer'>";
    print $row['text'];
    print "</div></div>";
    }
    
}


?>
