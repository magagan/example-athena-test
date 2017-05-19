<?php

/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 08/03/2017
 * Time: 12:57 PM
 */

namespace Tests\Bdd\context;

use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\homePage;
use Tests\Pages\registrationPage;

class homepageContext extends AthenaTestContext
{
    private $homepage;
    private $registration;

    public function __construct(){
        $this->homepage = new homePage();
        $this->registration = new registrationPage();
    }

    /**
     * @Given /^that user open homepage$/
     */
    public function thatUserOpenHomepage()
    {
        $this->homepage->openUrl("/");
    }

    /**
     * @Then /^the user should be able to see homepage contents$/
     */
    public function theUserShouldBeAbleToSeeHomepageContents()
    {
        $this->homepage->verifyHomepageContentExist();
    }

    /**
     * @Given /^the user should see Registration widget$/
     */
    public function theUserShouldSeeRegistrationWidget()
    {
        $this->homepage->verifyRegistrationWidgetExist();
    }

    /**
     * @When /^the user click Tab Five$/
     */
    public function theUserClickTabFive()
    {
        $this->homepage->clickTabFive();
    }

    /**
     * @Then /^the user should see the correct content title$/
     */
    public function theUserShouldSeeTheCorrectContentTitle()
    {
        \PHPUnit_Framework_Assert::assertEquals(homePage::STRING_TAB_5,$this->homepage
            ->getBrowser()
            ->getCurrentPage()
            ->getElement()
            ->withCss(homePage::ELEMENT_TAB_5_TITLE_CSS)
            ->thenFind()
            ->asHtmlElement()
            ->getText());
    }

    /**
     * @Given /^the user should see the correct content description$/
     */
    public function theUserShouldSeeTheCorrectContentDescription()
    {
        \PHPUnit_Framework_Assert::assertEquals(homePage::STRING_TAB_DESC,$this->homepage
            ->getBrowser()
            ->getCurrentPage()
            ->getElement()
            ->withCss(homePage::ELEMENT_TAB_DESC_CSS)
            ->thenFind()
            ->asHtmlElement()
            ->getText());
    }

    /**
     * @When /^the user click Registration button$/
     */
    public function theUserClickRegistrationButton()
    {
        $this->homepage->clickRegistrationWidget();
    }

    /**
     * @Then /^the user should navigate to registration page$/
     */
    public function theUserShouldNavigateToRegistrationPage()
    {
        $this->registration->verifyMainContentOfPageExists();
    }

    /**
     * @Given /^the registration form should be displayed$/
     */
    public function theRegistrationFormShouldBeDisplayed()
    {
        $this->registration->verifyRegistrationFormExists();
    }


}