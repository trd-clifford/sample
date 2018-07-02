<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseControllerException extends \Exception { }

class TrgApiBaseController extends Controller
{
    protected $modelName = '';
    
    private function getModel() {
        if (!class_exists($this->modelName)) {
            throw new \Exception('An unexpected error occurred. Please contact customer support. E1002');
        }
        return new $this->modelName;
    }
    
    public function getData(TrgApiReceiveController $receiver, Request $request) {
        
        $Model = $this->getModel();
        
        // whereIn
        $where_in = $request->input('where_in');
        if (isset($where_in)) {
            foreach ($where_in as $key => $value) {
                if (!$value) { continue; }
                $Model = $Model->whereIn($key, explode(',', $value));
            }
        }
        
        // where
        $where = $request->input('where');
        foreach ($where as $key => $value) {
            if (!$value) { continue; }
            list($formula, $val) = explode(',', $value);
            if (!$val) { continue; }
            $Model = $Model->where($key, $formula, $val);
        }
        
        // order
        $where = $request->input('order');
        foreach ($where as $key => $value) {
            if (!$value) { continue; }
            $Model = $Model->orderBy($key, $value);
        }
        
        // offset
        $offset = $request->input('offset');
        $limit  = $request->input('limit');
        if ($offset != '' && $limit != '') {
            $Model = $Model->offset($offset)->limit($limit);
        }
        
        $receiver->result = $Model->get();
        if (!count($receiver->result)) {
            $receiver->message = 'There is nothing that can be displayed.';
        }
        
    }
    
    public function updateData(TrgApiReceiveController $receiver, Request $request) {
        
        $receiver->message = 'Failed';
        $params  = $request->input('p');
        $status  = array();
        
        // transaction start
        DB::beginTransaction();
        try {
            foreach ($params as $index => $data) {
                $new_flg = true;
                $Model = $this->getModel();
                if (isset($data['id']) && $res = $Model->find($data['id'])) {
                    $Model = $res;
                    $new_flg = false;
                }
                foreach ($data as $key => $value) {
                    $Model->$key = $value;
                }

                $this->saveImage($request, $Model, $index);

                $Model->save();
                $status[$index] = ($new_flg) ? 'created' : 'updated';
            }
            
            // roleback test
            // throw new BaseControllerException('roleback_test');
            
            // commit
            DB::commit();
            $receiver->message = 'Updated Succsess.';
            $receiver->result = $status;
        } catch (BaseControllerException $e) {
            // rollback
            DB::rollback();
            $receiver->message = 'Updated Faild.';
            $receiver->result = $status;
            throw new \Exception('BaseControllerException: '. $e->getMessage());
        }
    }
    
    public function deleteData(TrgApiReceiveController $receiver, Request $request) {
        
        $receiver->message = 'Failed';
        $ids = explode(',', $request->input('id'));
        $status = array();
        
        // transaction start
        DB::beginTransaction();
        try {
            foreach ($ids as $index => $id) {
                $Model = $this->getModel();
                if ($res = $Model->find($id)) {
                    $res->delete();
                    $status[$index] = 'deleted';
                } else {
                    $status[$index] = 'faild';
                    throw new BaseControllerException("Could't delete");
                }
            }
            // commit
            DB::commit();
            $receiver->result = $status;
            $receiver->message = 'Delete Succsess.';
           
        } catch (BaseControllerException $e) {
            $receiver->message = 'Delete Faild.';
            $receiver->result = $status;
            // rollback
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }

    public function saveImage(Request $request, $model, $index){

        $files = $request->file('p');
        $date = date('F').date('Y');

        if(isset($files[$index])){
            foreach ($files[$index] as $input => $value) {

                $filenameWithExt = $request->file('p.'.$index.'.'.$input)->getClientOriginalName();
                $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $request->file('p.'.$index.'.'.$input)->move('storage/t102-drivers/'.$date.'/',$fileNameToStore);

                $model->$input = 't102-drivers/'.$date.'/'.$fileNameToStore;
            }
            $model->save();
        }
    }
}
