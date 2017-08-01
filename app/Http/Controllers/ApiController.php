<?php
namespace App\Http\Controllers;

use Response;

class ApiController extends Controller {
	protected $statusCode= 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Not fount!')
    {
    	return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respond($data, $headers = [])
    {
    	return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message)
    {
    	return $this->respond([
    		'error' => [
    			'message' => $message,
    			'status_code' => $this->getStatusCode()
    		]
		]);
    }
}