<?php 
class LoginCest
{
	public static $LOGIN_BUTTON = "//button[@type='submit'][text()='Log in']";
	public static $connecting_to_system_msg	= 'Connecting to the system, please wait.';
	public static $logout_el = "//*[text()='Log out']";
	
    public function _before(AcceptanceTester $I)
    {
    }
	
	public function _after(AcceptanceTester $I)
	{
	}

    // TESTS
	//happy path
	public function submitValidLoginDetails(AcceptanceTester $I, \Page\Acceptance\Login $loginPage)
    {
		$loginPage->login('zerahculvera@gmail.com','Password123#');
		$I->see(self::$connecting_to_system_msg);
		$I->waitForElement(self::$logout_el);
    }
	
	//elements present according to window size
	//field validation testing
	//broken link testing
}
