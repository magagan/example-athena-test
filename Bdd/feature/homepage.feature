@homepage
Feature: Home Page
  As a user,
  I want to access the home page,
  So that I can start browsing on Demo QA.

  @parallel-scenario
  Scenario: Verify that user is able to see correct content title when clicking tab
    Given that user open homepage
    Then the user should be able to see homepage contents
    And the user should see Registration widget
    When the user click Tab Five
    Then the user should see the correct content title
    And the user should see the correct content description

  @parallel-scenario
  Scenario: Verify that user is able to navigate in registration page
    Given that user open homepage
    When the user click Registration button
    Then the user should navigate to registration page
    And the registration form should be displayed