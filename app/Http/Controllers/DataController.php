<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\News;
use App\Character;



class DataController extends Controller {

    /**
     * News bot
     *
     * @return \Illuminate\Http\Response
     */
    public function news() {

        $url = 'https://us.api.battle.net/wow/guild/Durotan/Crwnage%20Crew?fields=news&locale=en_US&apikey=djxg2cdgvh4fcjd3u3ysm2279fgnqx5h';

        try {
            $json = file_get_contents($url);
            $test = json_decode($json);
        } catch (Exception $e) {
            echo $e;
        }

        //timestamp is in gmt

        //every hour grab the news
        //check what 

        //741 items in the one i have

        //maybe add a checked column

        //first time i run it checked is 0 for everything

        //then an hour later run again, loop through the new ones and cross check against ones that are already there?

        //well grab everything thats 0 and if its there make it 1 otheriwse insert

        //$unchecked = News::where('checked','=',0)->get();

        //but then how to check?

        //1-grab news
        // loop through news
        // check if its already there

        //if it isn't, add it


        //need to not have duplicates in the database
        //i wonder if i have my ebay code somewhere haha

        //get the last entry in the db, then only insert ones that are newer than that?

        //also check that that timestamp isnt already there?
        //they aren't unqiue. ok.





        foreach($test->news as $item) {


            //check if its already there

            $check = News::where('timestamp','=',$item->timestamp)->where('character','=',$item->character)->where('type','=',$item->type)->first();

            //if its not there need to add it to the database
            if (!isset($check->id)) {

                //create new news object
                $n = new News;

                //match from character id
                $n->user_id = 1;
                $n->character = $item->character;
                $n->type = $item->type;
                $n->timestamp = $item->timestamp;

                if (isset($item->itemId)) {
                    $item_id = $item->itemId;
                } else {
                    $item_id = 0;
                }



                $n->itemId = $item_id;
                $n->context = $item->context;
                $bonuslist = [];

                // print '<pre>';
                // print_r($item);
                // print '</pre>';            

                //check if bonuslist exists
                if (isset($item->bonusLists)) {
                    foreach($item->bonusLists as $key => $bonus) {
                        $bonuslist[$key] = $bonus;
                    }

                }

                print '<pre>';
                print_r($bonuslist);
                print '</pre>';

                unset($bonus);


                //if it does check if that combo already exists

                //if it does, take that id

                //otherwise make a new one

                //check if its set
                 if (isset($bonuslist[0])) {
                    $bonus0 = $bonuslist[0];
                 } else {
                    $bonus0 = 0;
                 }

                 if (isset($bonuslist[1])) {
                    $bonus1 = $bonuslist[1];
                 } else {
                    $bonus1 = 0;
                 }

                 if (isset($bonuslist[2])) {
                    $bonus2 = $bonuslist[2];
                 } else {
                    $bonus2 = 0;
                 }

                 if (isset($bonuslist[3])) {
                    $bonus3 = $bonuslist[3];
                 } else {
                    $bonus3 = 0;
                 }


                $n->bonus_0 = $bonus0;
                $n->bonus_1 = $bonus1;
                $n->bonus_2 = $bonus2;
                $n->bonus_3 = $bonus3;
                $n->updated_by = 0;
                $n->save();

            }



        }
    }


    /**
     * pull in member list - bot
     *
     * @return \Illuminate\Http\Response
     */
    public function members() {
        //https://us.api.battle.net/wow/guild/Medivh/Temp%20Guild%20Name?fields=members&locale=en_US&apikey=


        $url = 'https://us.api.battle.net/wow/guild/Durotan/Crwnage%20Crew?fields=members&locale=en_US&apikey=djxg2cdgvh4fcjd3u3ysm2279fgnqx5h';

        try {
            $json = file_get_contents($url);
            $members = json_decode($json);
        } catch (Exception $e) {
            echo $e;
        }



        foreach($members->members as $member) {

                    print '<pre>';
        print_r($member);
        print '</pre>';
            $m = new Character;
            $m->character = $member->character->name;
            $m->main_id = 0;
            $m->rank = $member->rank;
            $m->class_id = $member->character->class;
            $m->race_id = $member->character->race;
            $m->gender = $member->character->gender;
            $m->level = $member->character->level;
            $m->achievementPoints = $member->character->achievementPoints;
            $m->thumbnail = $member->character->thumbnail;
            $m->updated_by = 0;
            $m->save();
        }



    }






}
