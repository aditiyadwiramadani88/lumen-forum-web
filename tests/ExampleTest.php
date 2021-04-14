<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    // public function testQuestion() {

    //     $d = $this->call('POST', '/', [
    //         'question_title' => "ada bos",
    //         "tag"            => 'ada',
    //         'content'       => 'ada']);


    //     $this->assertEquals(200, $d->status());

    //  }


    //  public function testUpdateQuestion() {

    //     $data = $this->put('/3', ['content' => 'ada']);
    //     $data->assertResponseStatus(200);
    //  }



    //  public function testAnswere(){

    //     $data = $this->get('/Answere/3');
    //     $data->assertResponseStatus(200);

    //   //
    //     $data  = $this->post('/Answere/6', ['content' => 'ada']);
    //     $data->assertResponseStatus(200);


    //     $data  = $this->put('/Answere/5', ['content' => 'apakabar sayang']);
    //     $data->assertResponseStatus(200);

    //   $data = $this->delete('/Answere/5');
    //   $data->assertResponseStatus(200);







    //  }


    public function testRegister() {
     $data= $this->post('/login', ['username' => 'adit', 'email' => 'aditiya@gmail.com', 'password' => 'rambutgimbal']);
     $data->assertResponseStatus(200);

    }


}
