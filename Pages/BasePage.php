<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/09/2018
 * Time: 5:25 PM
 */

namespace Tests\Pages;

use Athena\Athena;
use Athena\Page\AbstractPage;

class BasePage extends AbstractPage
{

    public function __construct()
    {
        parent::__construct(Athena::browser(), '/');
    }

    /**
     * Getting element attributes
     * @param $type
     * @param $element
     * @param $attribute
     * @return array|mixed
     */
    public function getElementAttributes ($type,$element,$attribute)
    {
        $type = strtolower($type);
        $string = null;
        switch ($type)
        {
            case "xpath":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                break;
            case "name":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                break;
            case "id":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                break;
            case "css":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                break;
        }

        $stringAttr = explode(';',$string->thenFind()->asHtmlElement()->getAttribute($attribute));
        $stringAttr = array_shift($stringAttr);
        return $stringAttr;
    }

    /**
     * Getting text of an element
     * @param $type
     * @param $element
     * @return string
     */
    public function getElementText ($type,$element)
    {
        $type = strtolower($type);
        $string = null;
        switch ($type)
        {
            case "xpath":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                break;
            case "name":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                break;
            case "id":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                break;
            case "css":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                break;
        }

        return $string->thenFind()->asHtmlElement()->getText();
    }

    /**
     * Method to check if element is present
     * @param $type
     * @param $element
     * @return bool
     */
    public function assertElementPresentAtLeastOnce($type, $element)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithXpath($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;

            case "name":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithName($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
            case "id":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithId($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
            case "css":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
        }
    }

    /**
     * Generic Method to input string at textbox
     * @param $type
     * @param $element
     * @param $string
     */
    public function enterString($type,$element,$string)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $this->page()->find()->elementWithXpath($element)->click();
                sleep(1);
                $this->page()->find()->elementWithXpath($element)->sendKeys($string);
                break;
            case "name":
                $this->page()->find()->elementWithName($element)->click();
                sleep(1);
                $this->page()->find()->elementWithName($element)->sendKeys($string);
                break;
            case "id":
                $this->page()->find()->elementWithId($element)->click();
                sleep(1);
                $this->page()->find()->elementWithId($element)->sendKeys($string);
                break;
            case "css":
                $this->page()->find()->elementWithCss($element)->click();
                sleep(1);
                $this->page()->find()->elementWithCss($element)->sendKeys($string);
                break;
        }
    }

    /**
     * Genetic Method to select from dropdown selection
     * @param $type
     * @param $element
     * @param $string
     */
    public function selectInDropDownValue($type,$element,$string)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "name":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "id":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "css":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
        }
        sleep(5);
    }

    /**
     * Generic Method to click element in a page
     * @param $type
     * @param $element
     */
    public function clickElement($type,$element)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath";
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithXpath($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithXpath($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithXpath($element)->click();
                $this->page()->find()->elementWithXpath($element)->click();
                //$this->page()->wait(5)->elementWithXpath($element)->click();
                break;
            case "name":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithName($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithName($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithName($element)->click();
                $this->page()->find()->elementWithName($element)->click();
                //$this->page()->wait(5)->elementWithName($element)->click();
                break;
            case "id":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithId($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithId($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithId($element)->click();
                $this->page()->find()->elementWithId($element)->click();
                //$this->page()->wait(5)->elementWithId($element)->click();
                break;
            case "css":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithCss($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithCss($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithCss($element)->click();
                $this->page()->find()->elementWithCss($element)->click();
                //$this->page()->wait(5)->elementWithCss($element)->click();
                break;
        }
    }

    /**
     * @param $type
     * @param $element
     * @return \Facebook\WebDriver\Remote\RemoteWebElement
     */
    public function verifyElementNotPresent($type, $element){

        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithXpath($element);
                break;
            case "name":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithName($element);
                break;
            case "id":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithId($element);
                break;
            case "css":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithCss($element);
                break;
        }
    }

    /**
     * Injecting cookies in page
     */
    public function cookieSet()
    {
        sleep(3);
        $this->getBrowser()->manage()->addCookie(['domain' => '.olx.ph','name' => 'optimizelyOptOut','value' => 'true']);
        //$cookies = $this->getBrowser()->manage()->getCookies();
        //print_r($cookies);
    }


    /**
     * Method to assert the url status
     * @param $url
     */
    public function checkUrl($url){
        $status = $this->getUrlStatus($url);
        if(substr($status,0,1)!=2){
            \PHPUnit_Framework_Assert::fail($url.' is broken. status : '.$this->getUrlStatus($url));
        }
    }

    /**
     * Checking of URL http response status
     * @param $url
     * @return mixed
     */
    public function getUrlStatus($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $returnCode;
    }






}