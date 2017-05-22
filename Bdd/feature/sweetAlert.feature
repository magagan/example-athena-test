@sweetAlert
  Feature: Sweet Alert

    @scenario
    Scenario: Verify that user should be able to click sweet alert confirmation
      Given that user is in sweet alert page
      Then the user should see the sweet alert button
      When the user click the sweet alert button
      Then the user should see the sweet alert lightbox confirmation popup
      When the user click OK to confirm
      Then the sweet alert lightbox confirmation popup is closed