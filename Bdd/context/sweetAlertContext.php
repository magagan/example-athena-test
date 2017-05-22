<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 22/05/2017
 * Time: 3:59 PM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Tests\Pages\sweetAlertPage;

class sweetAlertContext extends AthenaTestContext
{

    private $sweetalert;

    public function __construct(){
        $this->sweetalert = new sweetAlertPage();
    }

    /**
     * @Given /^that user is in sweet alert page$/
     */
    public function thatUserIsInSweetAlertPage()
    {
        $this->sweetalert->openUrl('sweetalert');
    }

    /**
     * @Then /^the user should see the sweet alert button$/
     */
    public function theUserShouldSeeTheSweetAlertButton()
    {
        $this->sweetalert->verifySweetAlertButton();
    }

    /**
     * @When /^the user click the sweet alert button$/
     */
    public function theUserClickTheSweetAlertButton()
    {
        $this->sweetalert->clickSweetAlerButton();
    }

    /**
     * @Then /^the user should see the sweet alert lightbox confirmation popup$/
     */
    public function theUserShouldSeeTheSweetAlertLightboxConfirmationPopup()
    {
        $this->sweetalert->verifySweetAlertLightboxDisplayed();
    }

    /**
     * @When /^the user click OK to confirm$/
     */
    public function theUserClickOKToConfirm()
    {
        $this->sweetalert->clickOkButtonInSweetAlertLightboxPopup();
    }

    /**
     * @Then /^the sweet alert lightbox confirmation popup is closed$/
     */
    public function theSweetAlertLightboxConfirmationPopupIsClosed()
    {
        \PHPUnit_Framework_Assert::assertEquals(false, $this->sweetalert->assertElementPresent(sweetAlertPage::ELEMENT_SWEET_ALERT_LB_POPUP_CSS));
    }
}