<?php

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

$steps->Then('/^I can see a "([^"]*)" link$/', function($world, $arg1) {
  $var = '//a/text()[contains(. ,"'.$arg1.'")]';
  
  try {
    $world->selenium->assertElementContainsText($var,$arg1);
  } catch (Exception $ex) {
    $world->selenium->stop();
    throw $ex;
  }
 
});


$steps->Then('/^I stop browsing$/', function($world) {
  
  $world->selenium->stop();
});


?>
