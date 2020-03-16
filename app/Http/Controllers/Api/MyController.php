<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


/** 
* @group User management

* APIs for managing user

     
     * @param  int  $id
     * @return \Illuminate\Http\Response
*/
class MyController extends Controller
{
    /**
     * Show user info.
     * @authenticated
     * 
     * @response {"id":3,"name":"Filippo","email":"test3@test.it","email_verified_at":null,"created_at":"2020-03-14T19:10:28.000000Z","updated_at":"2020-03-14T19:10:28.000000Z"}
     * @response 401 {"message": "Unauthenticated."}
     */

    public function user() {


        $user = auth()->user();

        return response($user);

    }
}
