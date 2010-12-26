Feature: User Login

Background:
  Given The database is fresh

Scenario: User can see a create login link
  Given I am an anonymous user
  Given I am using "chrome" browser
  Given I am on project alpha homepage
   Then I can see a register link 
  
  
