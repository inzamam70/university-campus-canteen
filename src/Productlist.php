<?php

namespace BITM\CUMPUS;

use BITM\CUMPUS\Config;


class Productlist
{
    public $id = null;
    public $uuid = null;
    public $src = null;
    public $alt = null;
    public $tittle = null;
    public $caption = null;

    private $productitems = null;

    public function __construct()
    {
        $productjson = file_get_contents(Config::datasource() . 'productlist.json');
        $this->productitems = json_decode($productjson);
    }

    public function index()
    {
        return $this->productitems;
    }
    public function create()
    {
    }

    public function store($product)
    {
        $product = $this->prepare($product);
        $this->productitems[] = (object)(array)$product;
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
    public function update($product)
    {
        $product = $this->prepare($product);

        foreach ($this->productitems as $key => $aslide) {
            if ($aslide->id == $product->id)
                break;
        }

        $this->productitems[$key] =  $product;
        return $this->insert();
    }
    public function destroy($id)
    {
        
        if (empty($id)) {

            return;
        }

        foreach ($this->productitems as $key => $slide) {
            if ($slide->id == $id) {

                break;
            }
        }
     
        unset($this->productitems[$key]);
        $this->productitems = array_values($this->productitems);
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

        if (count($this->productitems) > 0) {
            $ids = [];
            foreach ($this->productitems as $aslide) {
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

    private function prepare($product)
    {
        if (is_null($product->id) || empty($product->id)) {
            $product->id = $this->last_highest_id();
        }

        if (is_null($product->uuid) || empty($product->uuid)) {
            $product->uuid = uniqid();
        }

        return $product;
    }

    private function insert()
    {

        $productjson = Config::datasource() . "productlist.json";
        if (file_exists($productjson)) {
            file_put_contents($productjson, json_encode($this->productitems));
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
        foreach ($this->productitems as $aslide) {
            if ($aslide->id == $id) {
                $slide = $aslide;
                break;
            }
        }
        return $slide;
    }
}
