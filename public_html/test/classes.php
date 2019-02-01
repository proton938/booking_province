<?php
 
class Member
{
  public $username = "";
  private $loggedIn = false;
 
  public function login() {
    $this->loggedIn = true;
  }
 
  public function logout() {
    $this->loggedIn = false;
  }
 
  public function isLoggedIn() {
    return $this->loggedIn;
  }
}
 
$member = new Member();

$member->username = "Fred";
echo $member->username . " is " . ( $member->isLoggedIn() ? "logged in" : "logged out" ) . "<br>";

$member->login();
echo $member->username . " is " . ( $member->isLoggedIn() ? "logged in" : "logged out" ) . "<br>";

$member->logout();
echo $member->username . " is " . ( $member->isLoggedIn() ? "logged in" : "logged out" ) . "<br>";
 
?>