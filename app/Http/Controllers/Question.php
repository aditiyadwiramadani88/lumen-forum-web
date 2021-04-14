<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Question extends Controller{

    /**
     *
     * @param Request
     * @return response
     *
     */

    public function NewQuestion(Request $request){

        // validation
        $this->validate($request, [
            'question_title' => ['required'],
            'tag'            => ['required'],
            'content'        => ['required'],
        ]);

        // Get Input
        $data= $request->only('question_title', 'tag', 'content');
        $data['user'] = auth()->user()->username;

        // Create Question
        app('db')->table('question')->insert($data);

     return response(["status" => 'sucess create new question']);

    }



    /**
     * @return response
     */
public function DetailQuestion($id) {

    // get first data

        $data= app('db')->table('question')->where('id', $id);

        // check data
        if(!$data->first()){
            return response(['msg'=> 'id not fout'], 404);
        }

        return response($data->get());

}
/**
 *@return response
 */
public function DeleteQuestion($id){


    // get table question
    $db = app('db')->table('question')->where('user', auth()->user()->username)->where('id', $id);

    // check data
    if(!$db->where('id', $id)->first()){

        return response(['msg'=> 'id not fout'], 404);
    }

      // delete data question and answere
    $db->delete();
    app('db')->table('answere')->where('id_question', $id)->delete();

    return response(['status' => 'sucess delete data']);


}


    /**
     *
     * @param Request
     * @return response
     *
     */


public function EditQuestion(Request $request, $id) {


        // Get Input
    $data = $request->only('question_title', 'tag', 'content');

    // get table question
    $db = app('db')->table('question')->where('user', auth()->user()->username)->where('id', $id);

        // check data
        if (!$db->first()) {
            return response(['msg' => 'id not fout'], 404);
        }

    // update data
    $db->update($data);

    return response(['status' => 'success update data']);
}



}
