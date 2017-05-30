<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\News;
use App\Character;



class DisplayController extends Controller {

    /**
     * Show the index
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        //get the last like 20? news

        $news = News::take(15)->orderBy('timestamp','desc')->get();

        return view('pages.index')
        ->with('news',$news);
    }


    /**
     * Show the index
     *
     * @return \Illuminate\Http\Response
     */
    public function character($name) {


        $character = Character::where('character','=',$name)->first();

        //check if an alt or not

        if (isset($character->main_id)) {
            if ($character->main_id == 0) {
                //its a main, get the list of alts
                $alts = Character::where('main_id','=',$character->id)->get();
                $type = 'main';
                $main = '';
            } else {
                $type = 'alt';
                $main = Character::where('id','=',$character->main_id)->first();
                $alts = '';
            }
        } else {
            $alts = '';
            $main = '';
            $type = 'notfound';
        }

        return view('pages.character')
        ->with('character',$character)
        ->with('type',$type)
        ->with('alts',$alts)
        ->with('main',$main);
    }


    /**
     * Show the member list
     *
     * @return \Illuminate\Http\Response
     */
    public function members() {


        //get the last like 20? news

        $members = Character::all();

        return view('pages.members')
        ->with('members',$members);
    }


}
