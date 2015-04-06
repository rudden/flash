<?php

namespace Anax\Flash;

/**
 *	A controller for flashmessages.
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
	public function indexAction()
	{
		$this->theme->setTitle('FlashMessage');
		$this->theme->addStylesheet('css/flash.css');

		$output = $this->flash->output();

		$this->views->add('flash/index', [
			'output' => $output
		]);
	}



	public function demoAction()
	{
		if ( $this->request->getPost('error') ) {
            $this->flash->error('Error message');
        }
        elseif ( $this->request->getPost('success') ) {
           $this->flash->success('Success message');
        }
        elseif ( $this->request->getPost('info') ) {
           $this->flash->info('Info message');
        }
        elseif ( $this->request->getPost('warning') ) {
           $this->flash->warning('Warning message');
        }

		$this->response->redirect($this->url->create('flash'));
	}
}