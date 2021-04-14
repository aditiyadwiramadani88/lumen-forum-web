<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Answere extends Controller {

    /**
     * @param Request
     * @return response
     *
     */
    public function AnswereQuestion(Request $request, $id) {


        // validate
        $this->validate($request , ['content' => 'required']);

        // get input and check data
        $data = $request->only(['content']);
        $data['id_question'] = $id;
        $data['user'] = auth()->user()->username;


        // check data
        $check_data = app('db')->table('question')->where('id', $id)->first();
        if(!$check_data) {
            return response(['status'  => 'id not fout'], 404);
        }

        // sucess
        app('db')->table('answere')->insert($data);
        return response(['status' =>  'sucess']);




    }


    /**

     * @param Request
     * @return response
     *
     */


    public function EditAnswere(Request $request, $id)
    {


        // Get Input
        $data = $request->only('content');

        // get table question
        $db = app('db')->table('answere')->where('user', auth()->user()->username)->where('id', $id);

        // check data
        if (!$db->first()) {
            return response(['msg' => 'id not fout'], 404);
        }

        // update data
        $db->update($data);

        return response(['status' => 'success update data']);
    }



    /**
     * @return response
     *
     */

    public function DelAnswere($id){


        $db = app('db')->table('answere')->where('user', auth()->user()->username)->where('id', $id);

        // check data
        if (!$db->first()) {
            return response(['msg' => 'id not fout'], 404);
        }

        // delete data
        $db->delete();

        return response(['status' => 'succes delete data']);

    }




}