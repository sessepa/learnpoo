<?php

namespace App\Entity;

class Article
{
    /**
     * @var  string  $reference
     */
     private $reference ;

    /**
     * @var  string         $stradeName
     */
     private $stradeName;

     /**
      * @var  float   $price
      */
      private $price;

    /**
     * Variable de classe
     * @var
     */
      private static $remise;

    /**
     * ACCESSEUR pour une propriété de classe
     * @return mixed
     */
    public static function getRemise()
    {
        return self::$remise;
    }

    /**
     * MUTATEUR pour une propriété de classe
     * On cast en (int) pour ne pas avoir un nombre décimal
     * @param mixed $remise
     */
    public static function setRemise($remise)
    {
        self::$remise = (int)$remise;
    }



    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @param string $stradeName
     */
    public function setStradeName($stradeName)
    {
        $this->stradeName = $stradeName;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getStradeName()
    {
        return $this->stradeName;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    //D'autres méthodes d'objets

    /**
     * Hausse du prix en fonction du pourcentage
     * @param $percent
     * @return void
     */
    public function increasePrice($percent){
        $this->price=$this->price * (1 + $percent/100);
    }

    /**
     *  Baisse du prix en fonction du pourcentage
     * @param $percent : pourcentage
     * @return void
     */
    public function decreasePrice($percent){
        $this->price=$this->price * (1 - $percent/100);
    }

    /**
     * Methode permet de générer une référence à partir du nom commerciale stradeName
     * Remarque : Mauvaise façon de faire le nom de la méthode n'est pas clair
     * par rapport à ce qui est fait.
     * private : Car il va être utilisé UNIQUEMENT à l'intérieur de la classe
     * @return void
     */
    private function generateReference(){
        $words = explode(' ',$this->stradeName);
        $letters='';
        foreach ($words as $word) {
            $letters .=strtoupper(substr($word,0,1));
        }
        return $letters;
    }

    /**
     * Permet de récupérer le résultat de generateReference est de l'affecter à la référence
     * Remarque : La meilleure méthode
     * @return void
     */
    public function autoAssignmentReference(){
      $this->reference = $this->generateReference();
    }

    public function getPriceAfterDiscount(){
       // return $this->price * (1 - Self::$remise/100);  // 1ere méthode
        return $this->price * (1 - self::getRemise()/100); // 2ème méthode
    }


}