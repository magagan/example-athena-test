<?php

/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 08/03/2017
 * Time: 12:52 PM
 */
namespace Tests\Pages;

use Athena\Athena;
use Athena\Page\AbstractPage;


class homePage extends BasePage
{
    const ELEMENT_MAINCONTENT_CSS = 'div.entry-content';
    const ELEMENT_REGISTRATION_BUTTON_CSS = '#menu-registration li a';
    const ELEMENT_TAB_5_CSS = 'ul#tab_ul li:nth-child(5)';
    const ELEMENT_TAB_5_TITLE_CSS = 'div.tabcontents div div:nth-child(6) b';
    const ELEMENT_TAB_DESC_CSS = 'div.tabcontents div div:nth-child(6) p:nth-child(2)';

    const STRING_TAB_5 = 'Content 5 Title';
    const STRING_TAB_DESC = 'The content could contain anything text page or submit form or any other HTML objects.';

    /*
     * Open site url
     */
    public function openUrl() {
        Athena::browser()->get('demoqa');
        Athena::browser()->manage()->window()->maximize();
    }

    /**
     * Verify if the main content is displayed
     */
    public function verifyHomepageContentExist()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MAINCONTENT_CSS);
    }

    /**
     * Verify if the registration widget is displayed
     */
    public function verifyRegistrationWidgetExist()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_REGISTRATION_BUTTON_CSS);
    }

    /**
     * Clicking Registration widget
     */
    public function clickRegistrationWidget()
    {
        sleep(3);
        $this->page()->find()->elementWithCss(self::ELEMENT_REGISTRATION_BUTTON_CSS)->click();
    }

    /**
     * Clicking Tab 5
     */
    public function clickTabFive()
    {
        $this->page()->findAndAssertThat()->elementWithCss(self::ELEMENT_TAB_5_CSS)->click();
    }




}