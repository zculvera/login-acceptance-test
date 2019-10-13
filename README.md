# login-acceptance-test
Acceptance test for login page

## setup test environment
1. Install composer
2. Install phpunit
3. Install chromedriver
4. Download selenium-server
5. Install codeception via composer by running 
<code>composer require "codeception/codeception" --dev</code>
6. Create configuration files, test folders, and default test suites by runnning
<code>php vendor/bin/codecept bootstrap</code>
7. Configure test suite <code>acceptance.yml</code> to use Webdriver
8. Change <code>url</code> to <code>https://bank.paysera.com/en/login/</code>
9. Change <code>browser</code> to <code>chrome</code>

## setup before running test
1. Run selenium-server
2. Run chromedriver

## run test
1. Run command <code>php vendor/bin/codecept run acceptance --steps --html</code>
2. Check html results in <code>tests/_output/report.html</code>
