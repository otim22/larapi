<?php
namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends Controller {

	protected $statusCode= IlluminateResponse::HTTP_OK;

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

    /**
     * return not found
     * @param type|string $message 
     * @return type
     */
    public function respondNotFound($message = 'Not fount!')
    {
    	return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * 
     * @param type $data 
     * @param type|array $headers 
     * @return type
     */
    public function respond($data, $headers = [])
    {
    	return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * merges two arrays
     * @param type Paginator $lessons 
     * @param type $data 
     * @return type
     */
    public function respondWithPagination(Paginator $lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->count(),
                'Total_pages' => ceil($lessons->count() / $lessons->perPage()),
                'current_page' => $lessons->currentPage(),
                'limit' => $lessons->perPage()
            ]      
        ]);

        return $this->respond($data);
    }

    /**
     * Description
     * @param type $message 
     * @return type
     */
    public function respondWithError($message)
    {
    	return $this->respond([
    		'error' => [
    			'message' => $message,
    			'status_code' => $this->getStatusCode()
    		]
		]);
    }

    /**
     * @param type $message 
     * @return mixed
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'messsage' => $message
        ]);
    }

    /**
     * @param type $message 
     * @return mixed
     */
    public function respondFailed($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
                    ->respondWithError($message);
    }
}