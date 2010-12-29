Feature: User Login

Background:
  Given The database is fresh

Scenario: User can see a create login link
  Given I am using "chrome" browser
  Given I am an anonymous user
   When I go to project alpha homepage
   Then I can see a "Register" link 
   Then I stop browsing 


Scenario: User click register link
  Given I am using "chrome" browser
  Given I am an anonymous user
   When I go to project alpha homepage
   When I click on "Register" link
   Then I am on register page
   Then I stop browsing 

Scenario: User create account
  Given I am using "chrome" browser
  Given I am an anonymous user
   When I go to project alpha homepage
   When I click on "Register" link
   When I enter new details with user "test" with password "password" with email "test@test.test" with displayname "test user"
   When I click the register button
   Then I am on project alpha homepage
   Then I stop browsing 
