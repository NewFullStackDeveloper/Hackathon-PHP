<?php
//namespace app;
// use \polakjan\mvc\db;
/**
 * represents one row in the table `product`
 */
class Song
{
    // properties represent the columns of the table
    public $id = null;
    public $name = null;
    public $description = null;
    public $link = null;
    //public $genre = null;
    public $date = null;
    public static function find($id){
        $query="
            SELECT *
            FROM `song_table`
            WHERE `id`= ?
        ";
        $values=[
            $id,
        ];
        $statement= db::query($query, $values);
        $statement->setFetchMode(\PDO::FETCH_CLASS, static::class);
        return $statement->fetch();
    }
    public function insert()
    {
        $query = "
            INSERT
            INTO `song_table`
            (`name`, `link`, `description`, `date`)
            VALUES
            (?, ?, ?, ?)
        ";
        $values = [
            $this->name,
            $this->link,
            $this->description,
            $this->date,

        ];
        db::query($query, $values);
        
        
        // find the last inserted id and update this object's property
        $this->id = db::getConnection()->lastInsertId();
    }

    public function update()
    {
        $query = "
            UPDATE `song_table`
            SET `name`=?,
            `link`=?,
            `description`=?,
            `date`=?
            
       WHERE `id`=? ";
        $values = [

            $this->name,
            $this->link,
            $this->description,
            $this->date,
            $this->id

        ];
        db::query($query, $values);
        
        

    }

    public function save(){

        if($this->id){
            $this->update();
        }else{
            $this->insert();
        }
    }
}