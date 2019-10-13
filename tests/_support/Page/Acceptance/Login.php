<?php
namespace Page\Acceptance;

class Login
{
    // include url of current page
    public static $URL = '/en/login';

    /**
     UI MAP
	 */
	 //GENERIC ELEMENTS
	 public static $alert = '.alert';
	 
	 // PRESENT WHEN MAXIMIZED
	 public static $favicon 			= '/favicon.png';
	 public static $page_title_txt 		= 'Log in to your account - Paysera';
	 public static $login_panel_title	= 'LOG IN';
	 public static $email_label			= 'Email address, phone number:';
	 public static $email_textfield 	= "//input[@name='userIdentifier']";
	 public static $email_login_btn		= "//button[text()='Log in']";
	 public static $spinner_gif		 	= '.spinner';
	 public static $wrong_password_msg 	= 'Incorrect password. Please try again.';
	
	//PRESENT AFTER CONFIRMING EMAIL
	 public static $avatar_img			= '.user-avatar';
	 public static $user_identifier_txt	= "//div[contains(@class,'identifier-block')]/strong";
	 public static $edit_email_btn		= "//i[@class='ti-pencil']";
	
	 public static $mobile_app_tab			= "#login-methods-heading-app_credentials";
	 public static $mobile_app_msg_txt		= 'Paysera mobile app is free, reliable and safe method to login to the system';
	 public static $mobile_app_login_btn	= "//div/a[text()='I do not have the mobile app yet']/../preceding-sibling::div/button[text()='Log in']";
	 public static $no_mobile_yet_txt		= 'I do not have the mobile app yet';
	 public static $no_mobile_yet_btn		= "//a[text()='I do not have the mobile app yet']";
	
	 public static $password_tab			= '#login-methods-heading-user_credentials';
	 public static $password_label			= '#login-methods-heading-user_credentials strong';
	 public static $password_label_txt		= 'Password';
	 public static $password_textfield		= '#password';
	 public static $password_login_btn		= "//*[text()='Password']/../../..//button[text()='Log in']";
	 public static $forgot_password_link	= 'https://bank.paysera.com/en/reset-password';
	 
	// dont have account yet text
	// register now link
	
	// languages links
	// all rights reserved text
	// bank of lithuania link
	// privacy policy link
	// service agreements link
	// recommendations for the safe usage link
	
	// helpdesk link
	// helpdesk text (upon mouse over)
	
	// paysera logo
	// paysera link
	
	// paysera tagline
	// paysera purpose paragraph
	// appstore link
	// googleplay link
	
	 //PRESENT AFTER CLICKING NO MOBILE APP YET
	 public static $no_application_title	= "Do not have the application?";
	 public static $no_application_msg		= "Download free App from Google Play or App Store.";
	 
	 public static $appstore_link	= 'https://itunes.apple.com/app/paysera-mobile-wallet/id737308884';
	 public static $playstore_link	= 'https://play.google.com/store/apps/details?id=lt.lemonlabs.android.paysera';
	 public static $appstore_icon	= '.fa-apple';
	 public static $playstore_icon	= '.fa-android';
	 
	 public static $i_have_mobile_txt	= "I have the mobile app";
	 public static $i_have_mobile_btn	= "//a[text()='I have the mobile app']";
	// ABSENT BELOW 1200 width
	// paysera tagline
	// paysera purpose paragraph
	// appstore link
	// googleplay link
	
	// CHANGE BELOW 768 width
	// helpdesk link
	// helpdesk text
    
	/**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

	public function login($email, $password)
	{
		$I = $this->acceptanceTester;
		$I->amOnPage(self::$URL);
		$I->maximizeWindow();
		$I->waitForElement(self::$email_textfield);
		$I->fillField(self::$email_textfield, $email);
		$I->click(self::$email_login_btn);
		$I->waitForElement(self::$password_tab);
		$I->waitForElementNotVisible(self::$spinner_gif);
		$I->click(self::$password_tab);
		$I->fillField(self::$password_textfield, $password);
		$I->click(self::$password_login_btn);
		$I->waitForElement(self::$spinner_gif);
		$I->waitForElementNotVisible(self::$spinner_gif);
	}
	
	public function alertPasswordIsWrong()
	{
		$I = $this->acceptanceTester;
		$I->waitForElement(self::$alert);
		$I->see(self::$wrong_password_msg);
	}
}