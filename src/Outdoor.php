<?php

namespace BITM\CUMPUS;

use BITM\CUMPUS\Config;


class Outdoor
{
    public $id = null;
    public $uuid = null;
    public $src = null;
    public $alt = null;
    public $tittle = null;
    public $caption = null;

    private $outdoors = null;

    public function __construct()
    {
        $outdoorjson = file_get_contents(Config::datasource() . 'outdoorlist.json');
        $this->outdoors = json_decode($outdoorjson);
    }

    public function index()
    {
        return $this->outdoors;
    }
    public function create()
    {
    }

    public function store($outdoor)
    {
        $outdoor = $this->prepare($outdoor);
        $this->outdoors[] = (object)(array)$outdoor;
        return $this->insert();
    }

    public function show($id)
    {
        return $this->find($id);
    }
    public function edit($id = null)
    {
        return $this->find($id);
    }
    public function update($outdoor)
    {
        $outdoor = $this->prepare($outdoor);

        foreach ($this->outdoors as $key => $aslide) {
            if ($aslide->id == $outdoor->id)
                break;
        }

        $this->outdoors[$key] =  $outdoor;
        return $this->insert();
    }
    public function destroy($id)
    {
        
        if (empty($id)) {

            return;
        }

        foreach ($this->outdoors as $key => $slide) {
            if ($slide->id == $id) {

                break;
            }
        }
     
        unset($this->outdoors[$key]);
        $this->outdoors = array_values($this->outdoors);
        return $this->insert();
    }
    public function trash()
    {
    }
    public function delete()
    {
    }
    public function pdf()
    {
    }
    public function xl()
    {
    }


    public function word()
    {
    }
    public function last_highest_id()
    {
        $curentUniqueId = null;

        if (count($this->outdoors) > 0) {
            $ids = [];
            foreach ($this->outdoors as $aslide) {
                $ids[] = $aslide->id;
            }

            sort($ids);
            $lastIndex = count($ids) - 1;
            $highestId = $ids[$lastIndex];

            $curentUniqueId = $highestId + 1;
        } else {
            $curentUniqueId = 1;
        }

        return $curentUniqueId;
    }

    private function prepare($outdoor)
    {
        if (is_null($outdoor->id) || empty($outdoor->id)) {
            $outdoor->id = $this->last_highest_id();
        }

        if (is_null($outdoor->uuid) || empty($outdoor->uuid)) {
            $outdoor->uuid = uniqid();
        }

        return $outdoor;
    }

    private function insert()
    {

        $outdoorjson = Config::datasource() . "outdoorlist.json";
        if (file_exists($outdoorjson)) {
            file_put_contents($outdoorjson, json_encode($this->outdoors));
            return true;
        } else {
            echo "File not found";
            return false;
        }
    }

    public function find($id = null)
    {

        if (is_null($id) || empty($id)) {
            return false;
        }
        $slide = null;
        foreach ($this->outdoors as $aslide) {
            if ($aslide->id == $id) {
                $slide = $aslide;
                break;
            }
        }
        return $slide;
    }
}
