<?php

namespace BITM\CUMPUS;

use BITM\CUMPUS\Config;


class Slider
{
    public $id = null;
    public $uuid = null;
    public $src = null;
    public $alt = null;
    public $tittle = null;
    public $caption = null;

    private $slideritems = null;

    private $conn = null;

    public function __construct()
    {
        
        if(Config::$driver == 'mysql'){
            $this->connectdb();
        }elseif(Config::$driver == 'json'){
            $this->connectjson();
        }  

    }

    public function index()
    {
        

        return $this->slideritems;
    }
    public function index2(){
        $stmt = $this->conn->prepare('SELECT * FROM sliders');
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "\BITM\CUMPUS\Slider");
        $sliders = $stmt->fetchAll();
        return $this->slideritems = $sliders;

 
    }
    public function create()
    {
    }

    public function store($slider)
    {

        $slider = $this->prepare($slider);
        $this->slideritems[] = (object)(array)$slider;
        return $this->insert();
    }
    public function store2($slider){
             // prepare the sql; INSERT
             $stmt = $this->conn->prepare('INSERT INTO `sliders`  (`uuid`, `title`, `path`, `alt`, `caption`, `created_at`, `updated_at`, `created_by`, `updated_by`) 
             VALUES (:uuid, :title, :path, :alt, :caption, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :created_by, :updated_by)');
             
             $stmt->bindParam(':uuid', $slider->uuid, \PDO::PARAM_STR);
             $stmt->bindParam(':title',$slider->tittle, \PDO::PARAM_STR);
             $stmt->bindParam(':path', $slider->src, \PDO::PARAM_STR);
             $stmt->bindParam(':alt', $slider->alt, \PDO::PARAM_STR);
             $stmt->bindParam(':caption', $slider->caption, \PDO::PARAM_STR);
             $stmt->bindParam(':created_by', $slider->created_by, \PDO::PARAM_STR);
             $stmt->bindParam(':updated_by', $slider->updated_by, \PDO::PARAM_STR);
 
             // insert the data to database : Execute
 
             try{
                 $stmt->execute();
                 return true;
             }catch(\Exception $e){
                 echo $e->getMessage();
                 return false;
             }
 
    }

    public function show($id)
    {

        return $this->find($id);
    }
    public function show2($id){
        $stmt = $this->conn->prepare('SELECT * FROM sliders WHERE id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "\BITM\CUMPUS\Slider");
        return $slider = $stmt->fetch();

    }
    public function edit($id = null)
    {
        return $this->find($id);
    }
    public function update($slider)
    {
        $slider = $this->prepare($slider);

        foreach ($this->slideritems as $key => $aslide) {
            if ($aslide->id == $slider->id)
                break;
        }

        $this->slideritems[$key] =  $slider;
        return $this->insert();
    }
    public function destroy($id)
    {
        
        if (empty($id)) {

            return;
        }

        foreach ($this->slideritems as $key => $slide) {
            if ($slide->id == $id) {

                break;
            }
        }
     
        unset($this->slideritems[$key]);
        $this->slideritems = array_values($this->slideritems);
        return $this->insert();
    }

    public function destroy2($id){
        
        $stmt = $this->conn->prepare('DELETE FROM sliders WHERE id = :id');
        
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        
        $result = $stmt->execute();
        return $result;
   
        // $stmt->setFetchMode(\PDO::FETCH_CLASS, "\BITM\CUMPUS\Slider");
        //  return $slider = $stmt->fetch();
    }
    public function inactivate($uuid = null){ //completely removed
        if(empty($uuid)) {
            return;
        }

        $sql = "UPDATE `sliders` SET `activated_at` = CURRENT_TIMESTAMP, `is_active` = '0' WHERE `sliders`.`uuid` = :uuid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':uuid', $uuid, \PDO::PARAM_STR);
        $stmt->execute();
        return true;
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

        if (count($this->slideritems) > 0) {
            // finding unique ids
            $ids = [];
            foreach ($this->slideritems as $aslide) {
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

    private function prepare($slider)
    {
        if (is_null($slider->id) || empty($slider->id)) {
            $slider->id = $this->last_highest_id();
        }

        if (is_null($slider->uuid) || empty($slider->uuid)) {
            $slider->uuid = uniqid();
        }

        return $slider;
    }

    private function insert()
    {

        $sliderjson = Config::datasource() . "slider.json";
        if (file_exists($sliderjson)) {
            file_put_contents($sliderjson, json_encode($this->slideritems));
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
        foreach ($this->slideritems as $aslide) {
            if ($aslide->id == $id) {
                $slide = $aslide;
                //    dd($aslide);
                break;
            }
        }
        return $slide;
    }
    private function connectdb(){
            
        try {
            
                $this->conn = new \PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);
        } catch (\PDOException $e) {
            // If there is an error with the connection, stop the script and display the error.
            echo $e->getMessage();
            //echo 'Failed to connect to database!';
        }
    }
    private function connectjson(){
        $sliderjson= file_get_contents(Config::datasource().'slider.json');
        $this->slideritems = json_decode($sliderjson);
    }


}
