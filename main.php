<?php

// Here i am creating a class for containing numberss of my animals
class Ambar
{
    public $cawCount;
    public $henCount;
    public function __construct($cawCount, $henCount)
    {
        $this->cawCount = $cawCount;
        $this->henCount = $henCount;
    }
}

// this is the caw class that brings back a random number of milk liters
class Caw
{
    public $milk;
    public $id;
    public function __construct()
    {
        $this->id = substr(md5(rand()), 0, 3); // getting random id with length of 3 symbols
        $this->milk = rand(8, 12);
    }
}

// hen that gives as eggs random number from 0 to 1
class Hen
{
    public $eggs;
    public $id; //
    public function __construct()
    {
        $this->id = substr(md5(rand()), 0, 3); // getting random id with length of 3 symbols
        $this->eggs = rand(0, 1);
    }
}

//farm the main class of all it gives as an instance to see how much eggs and milk do we have by calculating the count of animals
// end using that count to create them in virtual ambar than counts all things 
class Farm
{
    public $StorageEggs;
    public $StorageMilk;
    public $ambar;
    public function __construct()
    {
        $this->ambar = new Ambar(10, 20);
    }

    public function returnEggs()
    {

        for ($i = 0; $i < $this->ambar->henCount; $i++) {
            $henNew = new Hen;
            $this->StorageEggs += $henNew->eggs;
        }
        echo $this->StorageEggs;
    }
    public function returnMilk()
    {
        for ($i = 0; $i < $this->ambar->cawCount; $i++) {
            $cawNew = new Caw;
            $this->StorageMilk += $cawNew->milk;
        }
        echo $this->StorageMilk;
    }
}

$myFarm = new farm;
echo 'Молока надоено ' . $myFarm->returnMilk() . '<br>';
echo 'Яиц собрано ' . $myFarm->returnEggs() . '<br>';
