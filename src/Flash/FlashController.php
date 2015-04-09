<?php

namespace Rudden\Flash;

/**
 *	A controller for a demo of the flashmessages.
 * 
 */
class FlashController
{
	use \Anax\DI\TInjectable;


	/**
	 * Boot up and view the output
	 * 
	 * @return void.
	 */
	public function demoAction()
	{
		$this->theme->setTitle('Demo');
		
		$output = $this->fmsg->print();

		$this->views->add('flash/index', [
			'output' => $output
		]);
	}



	/**
	 * Shows different flashes depending on submit
	 * 
	 * @return void.
	 */
	public function choiceAction()
	{
		if ( $this->request->getPost('error') ) {
            $this->fmsg->error('Error message');
        }
        elseif ( $this->request->getPost('success') ) {
           $this->fmsg->success('Success message');
        }
        elseif ( $this->request->getPost('info') ) {
           $this->fmsg->info('Info message');
        }
        elseif ( $this->request->getPost('warning') ) {
           $this->fmsg->warning('Warning message');
        }

		$this->response->redirect($this->url->create(''));
	}
}