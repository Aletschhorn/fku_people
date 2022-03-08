<?php
// Currently not in use for this extension

namespace FKU\FkuPeople\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FrontendAjaxController {

    /**
     * Notification filter action
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
	
	public function notificationFilterAction (ServerRequestInterface $request, ResponseInterface $response) {
		$data = $request->getQueryParams();
		$info = $data['keyword'];
		$ausgabe = ['show' => [3,12], 'hide' => [1,13,25]];
	    $response->getBody()->write(json_encode($ausgabe));
    	return $response;
	}
	
	
}

?>