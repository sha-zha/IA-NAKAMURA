<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Inertia\Inertia;

// models
use App\Models\Song;
use App\Models\User;

class SongController extends Controller
{
     public function index()
    {
    	$songs = Song::with('user')->orderBy('created_at','DESC')->get();
	    
	    return Inertia::render('Song/index',[
	    	'songs'=> $songs
	    ]);
    }

    public function show(Request $request, $id)
    {
    	
    	
    	$song = Song::with('user')->where('id', $id)->get();
	    
	    return Inertia::render('Song/show',[
	    	'song'=> $song
	    ]);
    }





    public function store(Request $request)
    {

    	//validation 

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'lyris' => 'required'
        ]);

    	//insert 
    	Song::create([
    		'title' => $request->title,
    		'lyris' => $request->lyris,
    		'user_id'=> auth()->user()->id
    	]);

    	return redirect()->route('songs');
    }


    public function update(Request $request )
    {

        

        $existSong = Song::find($request->id);


        if($existSong){

            $affected = DB::table('songs')
              ->where('id', $request->id)
              ->update(['title' => $request->title,'lyris'=>$request->lyris]);

              return redirect()->route('songs');

        }else{
            return 'Oups, une erreur c\'est produite';
        }

        
    }

    public function destroy(Request $request,$id )
    {

        $existSong = Song::findOrFail($id);


        if($existSong){

           
             $existSong->delete();
            return redirect()->route('songs')->with('success', 'Data is successfully deleted');

        }else{
            return 'Oups, une erreur c\'est produite';
        }

        
    }



}
