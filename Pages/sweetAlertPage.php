<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 22/05/2017
 * Time: 4:05 PM
 */

namespace Tests\Pages;

use Athena\Athena;
use Athena\Page\AbstractPage;

class sweetAlertPage extends AbstractPage
{
    const ELEMENT_SWEET_ALERT_BTN_CSS = 'div.showcase.sweet button';
    const ELEMENT_SWEET_ALERT_LB_POPUP_CSS = 'div.sweet-alert.showSweetAlert.visible';
    const ELEMENT_SA_BTN_CONFIRM_CSS = 'div.sa-confirm-button-container button.confirm';

    public function __construct()
    {
        parent::__construct(Athena::browser(), 'sweetAlert');
    }

    /*
     * Open site url
     */
    public function openUrl() {
        Athena::browser()->get('sweetalert');
        Athena::browser()->manage()->window()->maximize();
    }

    /**
     * click sweet alert button
     */
    public function clickSweetAlerButton() {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SWEET_ALERT_BTN_CSS)->click();
    }

    /**
     * verify Sweet Alert Button
     */
    public function verifySweetAlertButton() {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SWEET_ALERT_BTN_CSS);
    }

    /**
     * verify sweet alert lightbox displayed
     */
    public function verifySweetAlertLightboxDisplayed() {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SWEET_ALERT_LB_POPUP_CSS);
    }

    /**
     * click ok button in sweet alert lightbox popup
     */
    public function clickOkButtonInSweetAlertLightboxPopup() {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SA_BTN_CONFIRM_CSS)->click();
    }

    /*
     * Method to check if element is present by css
     */
    public function assertElementPresent($element = '')
    {
        try{
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss($element);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}