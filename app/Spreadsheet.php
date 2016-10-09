<?php

namespace App;

class Spreadsheet {
    public function get() {
        return [
            'error' => false,
            'data' => [
                    'season' => '2014-15',
                    'id' => '2',
                    'club'=> 'Alajuelense'
                ]
        ];
    }
    
    public function list() {
        return [
            'error' => false,
            'data' => array([
                    'season' => '2013-14',
                    'id' => '1',
                    'club'=> 'Alajuelense'],
                [
                    'season' => '2014-15',
                    'id' => '2',
                    'club'=> 'Alajuelense'
                ])
        ];
    }
}
