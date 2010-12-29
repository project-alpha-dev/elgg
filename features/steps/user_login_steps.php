<?php


$steps->Given('/^The database is fresh$/', function($world) {
  shell_exec('/opt/lampp/bin/mysql -u root elgg_alpha < /opt/lampp/htdocs/elgg/database_dump/elgg_alpha_dump.sql');
});


$steps->Given('/^I am an anonymous user$/', function($world) {
  $world->selenium->deleteAllVisibleCookies();
});


$steps->Given('/^I am using "([^"]*)" browser$/', function($world, $browser_type) {
  if (!$world->selenium)
  {
	$world->selenium = new WebTest();
  }
  $world->selenium->setBrowser('*'.$browser_type);
  $world->selenium->setBrowserUrl('http://localhost/elgg/');
  $world->selenium->start();
});


$steps->When('/^I go to project alpha homepage$/', function($world) {
  $world->selenium->open('http://localhost/elgg/');
});


$steps->Then('/^I am on project alpha homepage$/', function($world) {
  $world->selenium->assertTitle('Project Alpha');
});


$steps->When('/^I click on "([^"]*)" link$/', function($world, $arg1) {
    $var = '//a/text()[contains(. ,"'.$arg1.'")]';
    $world->selenium->click($var);
    $world->selenium->waitForPageToLoad();
});

$steps->Then('/^I am on register page$/', function($world) {
    $loc = $world->selenium->getLocation();
    $world->selenium->assertTrue(strpos($loc,'register')>0);
});


$steps->When('/^I enter new details with user "([^"]*)" with password "([^"]*)" with email "([^"]*)" with displayname "([^"]*)"$/', function($world, $user, $password, $email, $dpname) {
        $loc = "//input[@name='name']";
	$world->selenium->type($loc,$dpname);
	$world->selenium->assertElementValueEquals($loc, $dpname);

        $loc = "//input[@name='email']";
        $world->selenium->type($loc,$email);
	$world->selenium->assertElementValueEquals($loc, $email);

	$loc = "//input[@name='username']";
        $world->selenium->type($locator=$loc, $user);
	$world->selenium->assertElementValueEquals($loc, $user);

        $loc = "//input[@name='password']";
        $world->selenium->type($locator=$loc, $password);
	$world->selenium->assertElementValueEquals($loc, $password);

        $loc = "//input[@name='password2']";
        $world->selenium->type($locator=$loc,$password);
	$world->selenium->assertElementValueEquals($loc, $password);

});


$steps->When('/^I click the register button$/', function($world) {
    //$world->selenium->submit("document.forms[0]");
    $world->selenium->click("//input[@name='submit']");	
    $world->selenium->waitForPageToLoad(3000);
});



?>
