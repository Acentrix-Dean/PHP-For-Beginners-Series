<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require view('notes/show.view.php', [
    'heading' => 'My Note',
    'notes' => $note
]);