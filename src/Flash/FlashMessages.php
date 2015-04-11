<?php

namespace Rudden\Flash;

/**
 *	A controller for flashmessages.
 * 
 */
class FlashMessages
{
	use \Anax\DI\TInjectable;



	/**
	 * Set the flashed message in the session
	 * 
	 * @param string $type which type of message it is
	 * @param string $message which message to show in the flash
	 *
	 * @return void.
	 */
	public function message($type, $message)
	{
		$flash = $this->session->get('flashmessage', []);
		$flash[] = [
			'type'    => $type,
			'message' => $message
		];

		$this->session->set('flashmessage', $flash);
	}



	/**
	 * Output the stored flashmessage
	 * 
	 * @return string the stored message
	 */
	public function printMessage()
	{
		$flash = $this->session->get('flashmessage', []);

		$html = null;
		foreach ($flash as $value) {
			$html .= "<div class='flash " . $value['type'] . "'>" . $value['message'] . "</div>";
		}

		$this->session->set('flashmessage', []);

		return $html;
	}



	/**
	 * Run message method to flash a preffered message with the type info
	 *
	 * @param string $message which message to output to the user
	 * @return void
	 */
	public function info($message)
	{
		$this->message('info', $message);
	}



	/**
	 * Run message method to flash a preffered message with the type success
	 *
	 * @param string $message which message to output to the user
	 * @return void
	 */
	public function success($message)
	{
		$this->message('success', $message);
	}



	/**
	 * Run message method to flash a preffered message with the type error
	 *
	 * @param string $message which message to output to the user
	 * @return void
	 */
	public function error($message)
	{
		$this->message('error', $message);
	}



	/**
	 * Run message method to flash a preffered message with the type warning
	 *
	 * @param string $message which message to output to the user
	 * @return void
	 */
	public function warning($message)
	{
		$this->message('warning', $message);
	}
}