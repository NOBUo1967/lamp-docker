<?php

$users = [];

$dsn = 'mysql:host=db;port=3306;dbname=sample';
$username = 'app';
$password = 'password';

try {
  $pdo = new PDO($dsn, $username, $password);

  $statement = $pdo->query('SELECT * FROM user');
  $statement->execute();
  while ($row = $statement->fetch()) {
    $users[] = $row;
  }

  $pdo = null;
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

foreach ($users as $user) {
  echo '<p>id: ' . $user['id'] . ' name: ' . $user['name'] . '</p>';
}


// try {
//   $dsn = 'mysql:host=db;port=3306;dbname=sample';
//   $username = 'app';
//   $password = 'password';
//   $db = new PDO($dsn, $username, $password);

//   $sql = 'SELECT version();';
//   $contact = $db->prepare($sql);
//   $contact->execute();
//   $result = $contact->fetchAll(PDO::FETCH_ASSOC);
//   var_dump($result);
// } catch (PDOException $e) {
//   echo $e->getMessage();
//   exit;
// }
