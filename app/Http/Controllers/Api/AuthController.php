<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

/** 
* @group Authentication management

* APIs for managing authentication

     
*/
class AuthController extends Controller
{

    /**
     * Register new user.
     * 
     * @bodyParam name string required The name of the user. Example: Filippo
     * @bodyParam email string required The email of the user. Example: filippo@test.it
     * @bodyParam password string required The password of the user.
     * @bodyParam password_cofirmation string required The password of the user. 
     * 
     * @response {"user":{"id":1,"name":"Filippo","email":"filippo@test.it","created_at":"2020-03-15T10:30:45.000000Z","updated_at":"2020-03-15T10:34:16.000000Z"},"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2VlZjVjYzVlOWNlNjMzMzhkMjMwYmEzOTNhNTczMjc3NWRlNjU2NTY5OTc4ZmE3Y2ZiYmEyZTkyNmFiNWQxZTNmYjE4ZDk2ODUxNDliY2MiLCJpYXQiOjE1ODQyODM1NDksIm5iZiI6MTU4NDI4MzU0OSwiZXhwIjoxNjE1ODE5NTQ5LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.yUd0wHA309exgNzDudPd3a0ndjqaBsZ6HsGKwfeurJ1OJmgUjPxmEuK4CzQhkX8Q0dBWqhXDxWf73YMyegCmio18cTvYVGXS3Q3u_fRry3k0ok8uwPeEthPkNuAa9EHdk4yH-QXwNIRBcunT7ivNaoZU5BStOsf53dO-rpw-9azmHiaihM9OvjmiXp4kjobc2aFdrxKFDuB4Q8n0ou9_gsH78jIJwtXnowAHl6hFDaZLGh8r_WzVUsXNozizbh_QZbWPrcSpuWwyUOw6TiH8-xie4Reofgbi-jQDPbvuebBdg-3ArXcw93BYz5dCqpAuASqbGTQUfY2bwkhCJY9l1fqc_HmbpZCaE_6lk-RQiOPOavhxoYmELOLlNSupBbJW2iTBSq1FWvDR6rc6dpJxmlvITre9vWuhdwHQH8wJWDkVuG7IGtvyEohZJObCsd0-e3h-_ueU1mhXsuYuXHoOTEzDrSZhdvwTAkP2KhIYsPCdwBefkjaQuHbC9OjuZvxjrvdPGEnJV3_m4THGHwkEgb4yzI3JH7E8EEktT_r1muZFfqCetRNOanw3X95JIw9ZB2TmiacVI32zMKI3P8o31bjfkPKvoL6J1Kpkh2Rckzpj3VQ0pOitpbTy0YXkJ3szOQCKRsSfyPJr_ZddOYEQoYHdRO2UcZFmzXtJeLcaIv0"}
     * @response 422 {"message":"The given data was invalid.","errors":{"email":["The email has already been taken."]}}
     */
    public function register(Request $request) {

        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
       
    }

    /**
     * Login user.
     * 
     * @bodyParam email string required The email of the user. Example: filippo@test.it
     * @bodyParam password string required The password of the user.
     * 
     * @response {"user":{"id":1,"name":"Filippo","email":"filippo@test.it","email_verified_at":"null","created_at":"2020-03-15T10:30:45.000000Z","updated_at":"2020-03-15T10:34:16.000000Z"},"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2VlZjVjYzVlOWNlNjMzMzhkMjMwYmEzOTNhNTczMjc3NWRlNjU2NTY5OTc4ZmE3Y2ZiYmEyZTkyNmFiNWQxZTNmYjE4ZDk2ODUxNDliY2MiLCJpYXQiOjE1ODQyODM1NDksIm5iZiI6MTU4NDI4MzU0OSwiZXhwIjoxNjE1ODE5NTQ5LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.yUd0wHA309exgNzDudPd3a0ndjqaBsZ6HsGKwfeurJ1OJmgUjPxmEuK4CzQhkX8Q0dBWqhXDxWf73YMyegCmio18cTvYVGXS3Q3u_fRry3k0ok8uwPeEthPkNuAa9EHdk4yH-QXwNIRBcunT7ivNaoZU5BStOsf53dO-rpw-9azmHiaihM9OvjmiXp4kjobc2aFdrxKFDuB4Q8n0ou9_gsH78jIJwtXnowAHl6hFDaZLGh8r_WzVUsXNozizbh_QZbWPrcSpuWwyUOw6TiH8-xie4Reofgbi-jQDPbvuebBdg-3ArXcw93BYz5dCqpAuASqbGTQUfY2bwkhCJY9l1fqc_HmbpZCaE_6lk-RQiOPOavhxoYmELOLlNSupBbJW2iTBSq1FWvDR6rc6dpJxmlvITre9vWuhdwHQH8wJWDkVuG7IGtvyEohZJObCsd0-e3h-_ueU1mhXsuYuXHoOTEzDrSZhdvwTAkP2KhIYsPCdwBefkjaQuHbC9OjuZvxjrvdPGEnJV3_m4THGHwkEgb4yzI3JH7E8EEktT_r1muZFfqCetRNOanw3X95JIw9ZB2TmiacVI32zMKI3P8o31bjfkPKvoL6J1Kpkh2Rckzpj3VQ0pOitpbTy0YXkJ3szOQCKRsSfyPJr_ZddOYEQoYHdRO2UcZFmzXtJeLcaIv0"}
    
    */
    public function login(Request $request) {
        
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required|'
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=> auth()->user(), 'access_token'=> $accessToken]);

    }
}
