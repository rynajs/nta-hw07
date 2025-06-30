<?php

interface Formatting
{
    public function format($string);
}

// інтерфейс для доставки:
interface Delivery
{
    public function deliver($formattedString);
}

// реалізації форматів:
class Formatter implements Formatting
{
    public function format($string)
    {
        return $string;
    }
}

class DateFormatter implements Formatting
{
    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

// конкретні реалізації доставки:
class EmailDelivery implements Delivery
{
    public function deliver($formattedString)
    {
        echo "Вывод формата ({$formattedString}) по имейл\n";
    }
}

class SmsDelivery implements Delivery
{
    public function deliver($formattedString)
    {
        echo "Вывод формата ({$formattedString}) в смс\n";
    }
}

class ConsoleDelivery implements Delivery
{
    public function deliver($formattedString)
    {
        echo "Вывод формата ({$formattedString}) в консоль\n";
    }
}

class Logger
{
    private $formatter;
    private $delivery;

    public function __construct(Formatting $formatter, Delivery $delivery)
    {
        $this->formatter = $formatter;
        $this->delivery = $delivery;
    }

    public function log($string)
    {
        $formatted = $this->formatter->format($string);
        $this->delivery->deliver($formatted);
    }
}


// виклик:
$formatter = new Formatter();
$delivery = new SmsDelivery();

$logger = new Logger($formatter, $delivery);
$logger->log('Emergency error! Please fix me!');
