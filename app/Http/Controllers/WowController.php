<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class WowController extends Controller {

    /**
     * Display the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function getCharacter($name) {

        $url = 'https://us.api.battle.net/wow/character/durotan/'.$name.'?locale=en_US&apikey=djxg2cdgvh4fcjd3u3ysm2279fgnqx5h';

        $json = file_get_contents($url);

        //echo $json;
        echo '<h1>test</h1>';

        $test = json_decode('{"lastModified":1493580963000"}');

        $test = 'eee';

        var_dump($test); 
        
        return view('welcome');
    }



}
