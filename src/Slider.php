<?php

namespace BITM\CUMPUS;

use BITM\CUMPUS\Config;


class Slider{
    public $id = null;
    public $uuid = null;
    public $src = null;
    public $alt = null;
    public $tittle = null;
    public $caption = null;

    private $slideritems = null;

    public function __construct()
    {
        $sliderjson = file_get_contents(Config::datasource().'slider.json');
        $this->slideritems = json_decode($sliderjson);
    }

    public function index()
    {
        // $sliderjson = file_get_contents(Config::datasource().'slider.json');
        // $slideritems = json_decode($sliderjson);

        return $this->slideritems;

    }
    public function create()
    {

    }

    public function store($slider)
    {
        // $result = false;

        // $sliderjson = file_get_contents(Config::datasource().'slider.json');
        // $slideritems = json_decode($sliderjson);
        $slider = $this->prepare($slider);

        $this->slideritems[] = (object)(array)$slider;

        // $slideritems[]= (object)(array) $data;

        // if(file_exists(Config::datasource()."slider.json")){
        //     $result = file_put_contents(Config::datasource()."slider.json",json_encode($slideritems));
        // }else{
        //     echo "File not found";
        // }
        // return $result;
        return $this->insert();


    }

    public function show($id){
        // $sliderjson = file_get_contents(Config::datasource().'slider.json');
        // $slideritems = json_decode($sliderjson);

        // $slide = null;
        // foreach($slideritems as $aslide){
        //     if($aslide->id == $id){
        //         $slide = $aslide;
        //         break;
        //     }
        // }
        // return $slide;
        return $this->find($id);
    }
    public function edit($id = null){
        return $this->find($id);
    }
    public function update($slider){
        $slider = $this->prepare($slider);

            foreach($this->slideritems as $key=>$aslide){
                if($aslide->id == $slider->id)
                break;
            }

            $this->slideritems[$key] =  $slider;
            return $this->insert();


    }
    public function destroy($id = null){
        if(empty($id)) {
            return;
        }

        foreach($this->slideritems as $key=>$slide){
            if($slide->id == $id){
                break;
            }
        }
        unset($this->slideritems[$key]);
        return $this->insert();


    }
    public function trash(){

    }
    public function delete(){

    }
    public function pdf(){

    }
    public function xl(){
        
    }


    public function word(){
        
    }
    public function last_highest_id(){

        // $curentUniqueId = null;

        // $sliderjson = file_get_contents(Config::datasource().'slider.json');
        // $slideritems = json_decode($sliderjson);

        // if(count($slideritems) > 0){
        //     // finding unique ids
        //     $ids = [];
        //     foreach($slideritems as $aslide){
        //         $ids[] = $aslide->id;
        //     }
        //     sort($ids);
        //     $lastIndex = count($ids)-1;
        //     $highestId = $ids[$lastIndex];

        //     $curentUniqueId = $highestId+1;
        // }else{
        //     $curentUniqueId = 1;
        // }

        // return $curentUniqueId;
        $curentUniqueId = null;

        if(count($this->slideritems) > 0){
            // finding unique ids
            $ids = [];
            foreach($this->slideritems as $aslide){
                $ids[] = $aslide->id;
            }
            sort($ids);
            $lastIndex = count($ids)-1;
            $highestId = $ids[$lastIndex];

            $curentUniqueId = $highestId+1;
        }else{
            $curentUniqueId = 1;
        }

        return $curentUniqueId;

    }

    private function prepare($slider){
        // $slider = new Slider();
        // $slider->id = $this->last_highest_id();
        // $slider->uuid = uniqid();
        // $slider->src = $src;
        // $slider->tittle = $tittle;
        // $slider->caption = $caption;
        // $slider->alt = $alt;

        // return $slider;
        if(is_null($slider->id) || empty($slider->id)){
            $slider->id = $this->last_highest_id();
       }
      
       if(is_null($slider->uuid) || empty($slider->uuid)){
        $slider->uuid = uniqid();
       }

        return $slider;

    }

    private function insert(){

        $sliderjson = Config::datasource()."slider.json";
        if(file_exists($sliderjson)){
            file_put_contents($sliderjson,json_encode($this->slideritems));
            return true;
        }else{
            echo "File not found";
            return false;
        }
    }

    public function find($id=null){
        if(is_null($id) || empty($id)){
            return false;
        }
        $slide = null;
        foreach($this->slideritems as $aslide){
            if($aslide->id == $id){
                $slide = $aslide;
                break;
            }
        }
        return $slide;
    }




}