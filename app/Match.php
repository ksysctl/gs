<?php

namespace App;

class Match {
    private $regex = '/^gsx+\$/';
    
    function request() {
        $response = \Unirest\Request::get(
            config('services.match.spreadsheet.url')
        );
        
        return $response;
    }
    
    function map($entries) {
        $objs = array();
        foreach ($entries as $obj) {
            $entry = new \stdClass();
            foreach ($obj as $key => $value) {
                if (preg_match_all($this->regex, $key, $matches)) {
                    $entry->{preg_replace($this->regex, '', $key)} = $value->{'$t'};
                }
            }
            $objs[] = $entry;
        }
        
        return $objs;
    }
    
    public function list() {
        $spreadsheet = ['error' => false, 'data' => array()];
        $response = $this->request();
        
        if ($response->code == 200) {
            $spreadsheet['data'] = $this->map(
                $response->body->feed->entry
            );
        } else {
            $spreadsheet['error'] = true;
        }
        
        return $spreadsheet;
    }
}
