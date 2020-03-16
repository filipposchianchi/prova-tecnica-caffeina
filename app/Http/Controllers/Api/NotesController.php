<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Note;
use App\Http\Resources\NoteResource;


/** 
* @group Notes management

* APIs for managing notes

     
*/
class NotesController extends Controller
{
    /**
    * Display a listing of the resource.
    * @authenticated

    *@response {"data":[{"id":4,"title":"a","description":"Dormouse slowly and don't much surprised, that had a mouse doesn't matter,' it further. So she.","created_at":"2020-03-14T17:14:45.000000Z","updated_at":"2020-03-14T17:14:45.000000Z","user_id":1},{"id":5,"title":"dignissimos","description":"I think that she was a very glad they all its eyes, 'Of course you mean \"purpose\"?' said the hall.","created_at":"2020-03-14T17:14:45.000000Z","updated_at":"2020-03-14T17:14:45.000000Z","user_id":1},{"id":6,"title":"impedit","description":"Said the kitchen. 'When we change to her as he had just at first, and she said the stick, and so.","created_at":"2020-03-14T17:14:45.000000Z","updated_at":"2020-03-14T17:14:45.000000Z","user_id":1}]}
    *@response 401 {"message": "Unauthenticated."}
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return NoteResource::collection(Note::get());
            // auth()->user()->notes()->latest()->paginate());
    }

    /**
     * Store a newly created note in storage.
     * @authenticated

     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @bodyParam title string required The title of the note. Example: My first note
     * @bodyParam description string required The descritption of the note. Example: This is the description of my first note

     *@response {"data":{"title":"titolo nota","description":"descrizione nota","user_id":2,"updated_at":"2020-03-15T18:23:50.000000Z","created_at":"2020-03-15T18:23:50.000000Z","id":13}}
     *@response 401 {"message": "Unauthenticated."}
     */

    /* @authenticated
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $note = auth()->user()->notes()->create($request->all());

        return new NoteResource($note);
    }

    /**
     * Display the specified note.
     * @authenticated
     * 
     * @urlParam note required id of the note
     * 
     * @response {"data":{"id":4,"title":"a","description":"Dormouse slowly and don't much surprised, that had a mouse doesn't matter,' it further. So she.","created_at":"2020-03-14T17:14:45.000000Z","updated_at":"2020-03-14T17:14:45.000000Z","user_id":1}}
     * @response 401 {"message": "Unauthenticated."}

     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return new NoteResource($note);

    }


    /**
     * Update the specified resource in storage.
     * @authenticated
     * 
     * @urlParam note required id of the note
     * 
     * @bodyParam title string required The title of the note. Example: Updated note
     * @bodyParam description string required The descritption of the note. Example: Updated description
     * 
     * @response {"data":{"id":4,"title":"Updated title","description":"Updated description","created_at":"2020-03-14T17:14:45.000000Z","updated_at":"2020-03-14T17:14:45.000000Z","user_id":1}}
     * @response 401 {"message": "Unauthenticated."}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $note->update($request->all());

        return new NoteResource($note);
    }

    /**
     * Remove the specified resource from storage.
     * @authenticated
     * 
     * @urlParam note required id of the note

     * @response {"message": "Note deleted"}
     * @response 401 {"message": "Unauthenticated."}
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response(['message' => 'Deleted!']);
    }
}
