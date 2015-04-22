<?php

namespace rudden\Flash;

/**
 * Test class for FlashMessages
 *
 */
class FlashMessagesTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Test
	 *
	 * @return void
	 *
	*/
	public function testTypesOfMessages()
	{
		$flash = new \rudden\Flash\FlashMessages();
		$di = new \Anax\DI\CDIFactoryDefault();
		$flash->setDI($di);

		$di->setShared('session', function () {
            		 $session = new \Anax\Session\CSession();
           		 $session->configure(ANAX_APP_PATH . 'config/session.php');
           		 $session->name();
           		 return $session;
        	});

		// success message
		$msg1 = $flash->message('success', 'success message');
		$msg2 = $flash->success('success message');
		$this->assertEquals($msg1, $msg2, "Values doesn't match");

		// info message
		$msg1 = $flash->message('info', 'info message');
		$msg2 = $flash->info('info message');
		$this->assertEquals($msg1, $msg2, "Values doesn't match");

		// warning message
		$msg1 = $flash->message('warning', 'warning message');
		$msg2 = $flash->warning('warning message');
		$this->assertEquals($msg1, $msg2, "Values doesn't match");

		// error message
		$msg1 = $flash->message('error', 'error message');
		$msg2 = $flash->error('error message');
		$this->assertEquals($msg1, $msg2, "Values doesn't match");
	}




	/**
	 *
	 * Test
	 *
	 * @return void
	 *
	*/
	public function testMessages()
	{
		$flash = new \rudden\Flash\FlashMessages();
		$di = new \Anax\DI\CDIFactoryDefault();
		$flash->setDI($di);

		$di->setShared('session', function () {
			$session = new \Anax\Session\CSession();
			$session->configure(ANAX_APP_PATH . 'config/session.php');
			$session->name();
			return $session;
		});

		$str = "test";

		$msg1 = $flash->message('info', $str);
		$msg2 = $flash->info('test');
		$this->assertEquals($msg1, $msg2, "Values doesn't match.");

		$msg1 = $flash->message('error', $str);
		$msg2 = $flash->error('test');
		$this->assertEquals($msg1, $msg2, "Values doesn't match.");

		$msg1 = $flash->message('success', $str);
		$msg2 = $flash->success('test');
		$this->assertEquals($msg1, $msg2, "Values doesn't match.");

		$msg1 = $flash->message('warning', $str);
		$msg2 = $flash->warning('test');
		$this->assertEquals($msg1, $msg2, "Values doesn't match.");
	}



	/**
	 *
	 * Test
	 *
	 * @return void
	 *
	*/
	public function testPrint()
	{
		$flash = new \rudden\Flash\FlashMessages();
		$di = new \Anax\DI\CDIFactoryDefault();
		$flash->setDI($di);

		$di->setShared('session', function () {
   			 $session = new \Anax\Session\CSession();
   			 $session->configure(ANAX_APP_PATH . 'config/session.php');
   			 $session->name();
    			 return $session;
		});

		$flash->info('info message');
		$msg1 = $flash->printMessage();

		$msg2 = "<div class='flash info'>info message</div>";

		$this->assertEquals($msg1, $msg2, "Values doesn't match");
	}
}
