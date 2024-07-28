<?php


echo "<pre>";

class car
{
    private $make;
    private $model;
    private $VIN;


    public function __construct($make, $model, $VIN)
    {
        $this->make = $make;
        $this->model = $model;
        $this->VIN = $VIN;
    }
    public function __destruct()
    {
        echo "Car with make: {$this->make}, model: {$this->model}, VIN: {$this->VIN} is destroyed<br>";
    }


    public function getDetails()
    {
        return "<br>Make: $this->make,<br> Model: $this->model,<br> VIN: $this->VIN";
    }

    public function setMake($make)
    {
        $this->make = $make;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function setVIN($VIN)
    {
        $this->VIN = $VIN;
    }

    public function getModel()
    {
        return $this->model;
    }


    public function getVIN()
    {
        return $this->VIN;
    }

    public function getMake()
    {
        return $this->make;
    }
}
class Inventory
{
    private $cars = [];

    public function addcar(car $car)
    {
        $this->cars[] = $car;
    }

    public function removeCar($VIN)
    {
        foreach ($this->cars as $key => $car) {
            if ($car->getVIN() === $VIN) {
                unset($this->cars[$key]);
                echo "Car with VIN $VIN has been removed.\n";
                return;
            }
        }
        echo "Car with VIN $VIN not found.\n";
    }
    public function listCars()
    {
        if (empty($this->cars)) {
            echo "No cars in the inventory.\n";
        } else {
            foreach ($this->cars as $car) {
                echo $car->getDetails() . "<br>";
            }
        }
    }
}

$car1 = new Car("Toyota", "Camry", "1HGCM82633A123456");
$car2 = new Car("Honda", "Civic", "1HGCM82633A654321");
$car3 = new Car("Ford", "Mustang", "1HGCM82633A789012");


$inventory = new Inventory();

$inventory->addCar($car1);
$inventory->addCar($car2);
$inventory->addCar($car3);

echo "Listing all cars in inventory:";
$inventory->listCars();

echo "<br>";
echo "<br>";
$inventory->removeCar("1HGCM82633A654321");
echo "<br>";
echo "<br>";
echo "Listing all cars in inventory after removal:";
echo "<br>";
echo "<br>";
$inventory->listCars();
echo "<br>";
echo "<br>";

echo "<pre>";
