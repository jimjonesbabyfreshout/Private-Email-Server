<?php
// Create a new email account.
$email = new Email();
$email->username = 'username';
$email->password = 'password';
$email->save();

// Configure your email client to use the new email account.
$config = array(
  'host' => 'localhost',
  'port' => 143,
  'username' => 'username',
  'password' => 'password',
  'encryption' => 'ssl',
);

$imap = new ImapClient($config);
$imap->connect();

// Send an email.
$email = new Email();
$email->to = 'to@example.com';
$email->from = 'from@example.com';
$email->subject = 'Subject';
$email->body = 'Body';
$email->send();

// Receive an email.
$emails = $imap->getEmails();
foreach ($emails as $email) {
  echo $email->subject;
}