<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    //

    // create note
    public function create(Request $request)
    {
        $insert_to_db = DB::table('notes')->insert([
           'title' => $request->title,
           'content' => $request->contents,
           'bg_color' => $request->bgColor
        ]);

        if ($insert_to_db){
            // Horray, insert new note successfully...

            return response()->json(['type' => true, 'message' => 'create note Successfully!']);
        } else {
            // database connection error
            return response()->json(['type' => false, 'message' => 'create note UnSuccessfully!']);
        }
    }

    // update note
    public function update(Request $request){
        $update_note = DB::table('notes')->where('id', $request->id)->update([
           'title' => $request->title,
           'content' => $request->contents,
           'bg_color' => $request->bgColor,
        ]);

        if ($update_note){
            // Horray, update note successfully...

            return response()->json(['type' => true, 'message' => 'update note Successfully!']);
        } else {
            // database connection error
            return response()->json(['type' => false, 'message' => 'update note UnSuccessfully!']);
        }
    }

    // delete Note
    public function delete(Request $request){
        $delete = DB::table('notes')->where('id', $request->id)->delete();

        if ($delete){
            // Horray, delete note successfully...

            return response()->json(['type' => true, 'message' => 'delete note Successfully!']);
        } else {
            // database connection error
            return response()->json(['type' => false, 'message' => 'delete note UnSuccessfully!']);
        }
    }

    // get all notes from database
    public function getAllNotes(){
        $notes = DB::table('notes')->get();
            // Horray, get all notes successfully...

            return response()->json(['type' => true, 'message' => 'get all notes Successfully!', 'notes' => $notes]);
    }

    // get note with id
    public function getNoteWithID(Request  $request){
        $findNote = DB::table('notes')->where('id', $request->id)->first();

        return response()->json(['type' => true, 'message' => 'get note Successfully!', 'notes' => $findNote]);
    }
}
