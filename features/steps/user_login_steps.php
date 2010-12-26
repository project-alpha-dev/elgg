<?php

$selenium;

$steps->Given('/^The database is fresh$/', function($world) {
  shell_exec('/opt/lampp/bin/mysql -u root elgg_alpha < /opt/lampp/htdocs/elgg/database_dump/elgg_alpha_dump.sql');
});

$steps->Given('/^I am an anonymous user$/', function($world) {
    //throw new \Everzet\Behat\Exception\Pending();
});

$steps->Given('/^I am using "([^"]*)" browser$/', function($world, $browser_type) {
  $selenium = new WebTest();
  $selenium->setBrowser('*chrome');
  $selenium->setBrowserUrl('http://localhost/elgg/');
  $selenium->start();
  $selenium->open('http://localhost/elgg');
  $selenium->assertTitle('Project Alpha');
  $selenium->stop();
  //$selenium->setBrowser('*'.$browser_type);
});




$steps->Given('/^I am on project alpha homepage$/', function($world) {
  //$result = file_get_contents('http://localhost/elgg');
  //$selenium->setBrowserUrl('http://localhost/elgg');
  //$selenium->open('http://localhost/elgg');
});

$steps->Then('/^I can see a register link$/', function($world) {
  //$selenium->assertTitleEquals('Project Alpha');
});



class WebTest extends PHPUnit_Extensions_SeleniumTestCase
{
  var $browser_type;
  var $browser_url;

  public function __construct($type = '*chrome', $url='http://localhost/elgg/')
  {
    $browser_type = $type;
    $browser_url = $url;
    parent::__construct();
  }


  protected function setUp()
  {
    $this->setBrowser($browser_type);
    $this->setBrowserUrl($browser_url);
  }

}


?>
