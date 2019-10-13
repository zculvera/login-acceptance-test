<?php 
class LoginCest
{
	public static $LOGIN_EN = '/en/login';
	public static $LOGIN_BUTTON = "//button[@type='submit'][text()='Log in']";
	
    public function _before(AcceptanceTester $I)
    {
		// $I->runShellCommand('run_selenium_server.sh');
		$I->amOnPage(self::$LOGIN_EN);
    }
	
	public function _after(AcceptanceTester $I)
	{
	}
	
	//functionality - positive
	//elements present according to window size
	//field validations
	//link 

    // tests
    public function validSubmitForm(AcceptanceTester $I)
    {
		$I->see('LOG IN');
		$I->fillField('userIdentifier','zerahculvera@gmail.com');
		$I->seeInField('userIdentifier','zerahculvera@gmail.com');
		$I->click(self::$LOGIN_BUTTON);
		$I->waitForElement('.identifier-block');
		$I->waitForElementNotVisible('.spinner');
		$I->see('zerahculvera@gmail');
		$I->click("//*[@id='login-methods-heading-user_credentials']");
		$I->fillField('userIdentifier','Password123#');
		$I->click("//button[@type='submit'][text()='Log in']");
    }
	
	public function wrongFormatEmail(AcceptanceTester $I)
	{
		$I->see('LOG IN');
		$I->fillField("//input[@id='userIdentifier']",'zerahculvera@gmail');
		$I->seeInField('userIdentifier','zerahculvera@gmail');
		$I->click("//button[@type='submit'][text()='Log in']");
		$I->waitForElement('[role~="alert"]');
		$I->waitForElementNotVisible('.spinner');
		$I->see('LOG IN');
		$I->see('The specified user could not be found');
	}
	
	// private function waitForAlert($element){
		// for($i=0; $i<3; $i++){
			// $I->waitForElement('[role~="alert"]');
		// }
	// }
}
