<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrgApiReceiveController extends Controller
{
    public $success = true;
    public $message = '';
    public $result  = array();
    public $params  = '';
    
    /**
     * get each controller
     * 
     * @throws \Exception
     * @return 
     */
    private function getApiController() {
        $class = __NAMESPACE__ . '\\' . request('ctl');
        if (!class_exists($class)) {
            throw new \Exception('An unexpected error occurred. Please contact customer support. E1001');
        }
        return new $class;
    }
    
    /**
     * set response
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function getResult(Request $request) {
        $result = array(
            'success' => $this->success,
            'message' => $this->message,
            'result'  => $this->result,
            'params'  => $request->except(array('_token'))
        );
        return response()->json($result);
    }
    
    /**
     * set error to response
     * 
     * @param \Exception $e
     */
    public function setError(\Exception $e) {
        report($e);
        $this->message = $e->getMessage();
        $this->success = false;
        $this->result['error'] = "Error: " . $e->getMessage() . " " . $e->getFile() . " " . $e->getLine();
    }
    
    /**
     * get
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request) {
       try {
           $Ctl = $this->getApiController();
           $Ctl->getData($this, $request);
       } catch (\Exception $e) {
           $this->setError($e);
       }
       return $this->getResult($request);
    }
    /**
     * update
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateData(Request $request) {
        try {
            $Ctl = $this->getApiController();
            $Ctl->updateData($this, $request);
        } catch (\Exception $e) {
            $this->setError($e);
        }
        return $this->getResult($request);
    }
    
    /**
     * delete
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteData(Request $request) {
        try {
            $Ctl = $this->getApiController();
            $Ctl->deleteData($this, $request);
        } catch (\Exception $e) {
            $this->setError($e);
        }
        return $this->getResult($request);
    }
    
    
}
