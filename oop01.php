<?php

//! OOP - Object Oriented Programming (programmazione orientata agli oggetti)

//! CLASSE

//! keyword class + nome della classe + { istruzioni}
//* REGOLE DEL NOME: inglese, iniziale maiuscola, singolare
// class Class{

// }


//! ACCESS MODIFIER = un modificatore di accesso - VISIBILITA

//* PUBLIC - L'ATTRIBUTO SARA ACCESSIBILE IN LETTURA E SCRITTURA OVUNQUE NEL CODICE

// * PROTECTED - accessibile in lettura e in scrittura SOLO nella classe stessa. DATA HIDING 


//* PRIVATE - stesso comportamentod di protected ma non viene ereditato
class Animal
{
    //! ATTRIBUTI/ PROPRIETA' 
    // nome, età, specie
    //caratteristiche comuni
    public $name;
    public $species;
    public $age;

    //! ATTRIBUTI e METODI STATICI
    // keyword static
    public static $counter = 0;

    //! METODO COSTRUTTORE : _ _ construct()
    // per costruire il mio oggetto
    public function __construct($nome, $specie, $eta) //nome, specie e eta sono parametri formali
    {
        //-> object operator
        $this->name = $nome;
        $this->species = $specie;
        $this->age = $eta;
        //$this->name ecc fanno riferimento agli attributi

        //attributo statico
        // si accede con :: = scope resolution operator
        self::$counter++;
        //! = della classe stessa (Self = Animal) prendi attributo statico counter e incrementalo di 1
    }

    //! METODI O COMPORTAMENTI
    public function info()
    {
        echo "E' un/a $this->species, si chiama $this->name e ha $this->age anni \n";
    }

    public function printName()
    {
        echo $this->name . "\n";
    }
    public function changeName($nome)
    {
        $this->name = $nome;
    }
}


//! creare oggetti di una classe = new + NomeClass()
$dylan = new Animal('Dylan', 'cane', 15);

// $harley->info();
$dylan->changeName('Bobby');
$dylan->printName();

//! richiamo attributo statico con NomeClasse::$attributo;
echo Animal::$counter . "\n";


//! EREDITARIETA - possibilita di EREDITARE attributi e metodi di un'altra classe per ESTENDERLA 
// extends - è figlia di Animal
class Pet extends Animal
{
    //attributi
    public $owner;
    public $city;

    public static $counter = 0;

    public function __construct($nome, $specie, $eta, $proprietario, $citta)
    {
        //keyword parent - il genitore
        parent::__construct($nome, $specie, $eta);

        $this->owner = $proprietario;
        $this->city = $citta;

        parent::$counter;

        self::$counter++;
    }

    public function informazioni()
    {
        echo "Ciao, io sono $this->owner, il mio $this->species si chiama $this->name, ha $this->age anni e viviamo insieme a $this->city \n";
    }
}


$pet = new Pet('Aaron', 'pappagallo', 3, 'Filippo', 'Santaninfa');
// $pet->informazioni();
$pet->name;
var_dump($pet);

// echo "Ho creato " . Animal::$counter . " animali e ho creato " . Pet::$counter . " animali domestici \n";

class WildAnimal extends Animal
{
    //attributi

    public $habitat;

    public function __construct($nome, $specie, $eta, $ecosistema)
    {
        parent::__construct($nome, $specie, $eta);
        $this->habitat = $ecosistema;
    }

    public function informazioni()
    {
        echo "E' un/a $this->species, ha $this->age anni, si chiama $this->name e vive in $this->habitat \n";
    }
}

$leone = new WildAnimal('Tobia', 'leone', 11, 'Africa');
// $leone->informazioni();
