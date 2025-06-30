<?php

abstract class Car {
    abstract public function getMake();
    abstract public function getPrice();
}

class EconomyCar extends Car {
    public function getMake() {
        return "Toyota Corolla";
    }

    public function getPrice() {
        return 100.0;
    }
}

class StandardCar extends Car {
    public function getMake() {
        return "Audi Q5";
    }

    public function getPrice() {
        return 200.0;
    }
}

class PremiumCar extends Car {
    public function getMake() {
        return "Mercedes-Benz";
    }

    public function getPrice() {
        return 300.0;
    }
}

class TaxiPark {
    public static function getCar($carType) {
        switch (strtolower($carType)) {
            case "economy":
                return new EconomyCar();
            case "standart":
                return new StandardCar();
            case "premium":
                return new PremiumCar();
            default:
                throw new Exception("Car class not supported");
        }
    }
}

// test:
function orderTaxi() {
    $carTypes = ["economy", "standart", "premium"];

    foreach ($carTypes as $carType) {
        try {
            $car = TaxiPark::getCar($carType);
            echo "\nТип таксі: $carType\n";
            echo "Модель: " . $car->getMake() . "\n";
            echo "Ціна: " . $car->getPrice() . " грн\n";
        } catch (Exception $e) {
            echo "Помилка: " . $e->getMessage() . "\n";
        }
    }
}

orderTaxi();

?>
