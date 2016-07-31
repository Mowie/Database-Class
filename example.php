<?php
require_once 'db-mysql.php';

$db = new db('localhost', 'testdb', 'root', 'supersecretpassword');
$db->setCol('blog');
//$db->data['id'] = 13;
//$db->get();
//print_r($db->get());
//print_r($db->data);


/*$db->data['titel'] = 'testdbclas';
$db->data['alias'] = '---d-d-d-d-';
$db->insert();*/
//if($db->insert(['titel' => 'testclass', 'inhalt' => 'baum', 'alias' => '0000003030498-g-dfghd-f'])) echo 'yay';

/*$db->data['titel'] = 'GAadsfhganz Neu';
$db->data['inhalt'] = 'gabs noch net';*/
//$db->update(['id' => 12]);
//if($db->update(['titel' => 'wat anderes', 'inhalt' => 'meh'], ['id' => 7])) echo 'update!';

//$db->data['id'] = 9;
//$db->delete();
//if($db->delete(['id' => 6])) echo 'del';

$db->clear();