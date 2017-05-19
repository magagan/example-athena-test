<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 08/05/2017
 * Time: 6:46 PM
 */

namespace Tests\Pages;

use Athena\Athena;
use Athena\Page\AbstractPage;

class registrationPage extends AbstractPage
{
    #constant variable (be descriptive as possible)
    const ELEMENT_REG_FORM_ID = 'pie_register_reg_form';
    const ELEMENT_MAIN_CONTENT_ID = 'content';
    const ELEMENT_FNAME_INPUT_ID = 'name_3_firstname';
    const ELEMENT_LNAME_INPUT_ID = 'name_3_lastname';
    const ELEMENT_MSTATUS_S_CSS = 'div.radio_wrap input[value="single"]';
    const ELEMENT_MSTATUS_M_CSS = 'div.radio_wrap input[value="married"]';
    const ELEMENT_MSTATUS_D_CSS = 'div.radio_wrap input[value="divorced"]';
    const ELEMENT_HOBBY_DANCE_CSS = '';
    const ELEMENT_HOBBY_READING_CSS = '';
    const ELEMENT_HOBBY_CRICKET_CSS = '';

    public function __construct()
    {
        parent::__construct(Athena::browser(), '/');
    }

    /**
     * Verify main content of page exists
     */
    public function verifyMainContentOfPageExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_MAIN_CONTENT_ID);
    }

    /**
     * Verify registration form exists
     */
    public function verifyRegistrationFormExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_REG_FORM_ID);
    }

}