<?php

class Size{
    public $width;
    public $height;
    function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
    }
}
trait reservable{
    function reserve(): void{
        echo "<p>Reserved</p>";
    }
}
trait electronic{
    function preview(): void{
        echo "<p>Summary</p>";
    }
}
class Item {
	public $price;
	public $title;
	public $size;
	public function __construct($title, $price, $size){
        $this->price=$price;
        $this->title=$title;
        if(is_array($size)){
            $this->size = new Size($size['width'],$size['height']);
        }else{
            $this->size = $size;
        }
    }
    function info(): void{
        echo "<p>Title: $this->title </p><p>Price: $this->price</p>";
	    if(is_object($this->size)){
           echo "<p>Height: {$this->size->height} cm</p><p>Width: {$this->size->width} cm</p>";
        }else{
	     echo "<p>File size: {$this->size}  MB</p>";
        }
	}
	function getPrice(float $price):float{
        $this->price = $price;
		return $this->price;
	}
}
class Release extends Item{
	public $pages;
	public $publisher;
	public $year;
	function __construct($title, $price, $size, $pages, $publisher, $year)
    {
        parent::__construct($title, $price,$size);
        $this->pages = $pages;
        $this->publisher = $publisher;
        $this->year = $year;
    }
    function info(): void
    {
        parent::info(); // TODO: Change the autogenerated stub
        echo "<p>Year: $this->year</p><p>Pages: $this->pages</p><p>Publisher: $this->publisher</p>";
    }
}
class Subscription extends Release {
	public float $subscriptionPrice;
	public $numsPerYear;
	public $number;
	function __construct($title, $price, $size, $pages, $publisher, $year,float $subscriptionPrice, $numsPerYear, $number)
    {
        parent::__construct($title, $price, $size, $pages, $publisher, $year);
        $this->subscriptionPrice = $subscriptionPrice;
        $this->numsPerYear = $numsPerYear;
        $this->number = $number;
    }
    function info(): void
    {
        parent::info(); // TODO: Change the autogenerated stub
        echo "<p>Subscription price: $this->subscriptionPrice</p><p>Release per year: $this->numsPerYear</p><p>Number : $this->number</p>";
    }

    function getSubscriptionPrice(?float $price): float{
	    $this->subscriptionPrice = $price;
		return $this->subscriptionPrice;
	}
}
//Start
class Book extends Release {
	public $hardcover;
	public array $genres;
	public string $author;
	use reservable;
	function __construct($price, $title, $author, $pages, $publisher, $year, $hardcover, $genres, $size)
    {
        parent::__construct($title, $price, $size, $pages, $publisher, $year);
        $this->author=$author;
        $this->hardcover=$hardcover;
        $this->genres=$genres;
    }
    function getGenres(): string {
        return implode(', ',$this->genres);
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Author: $this->author</p><p>Genres: {$this->getGenres()}</p><p>Hardcover: $this->hardcover</p>";
    }

}
class Magazine extends Subscription {
 use reservable;
}
class Newspaper extends Subscription {
    public $isColor;
    public function __construct($title, $price,$size, $pages, $publisher, $year, float $subscriptionPrice, $numsPerYear, $number, $isColor)
    {
        parent::__construct($title, $price, $size, $pages, $publisher, $year, $subscriptionPrice, $numsPerYear, $number);
        $this->isColor = $isColor;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Color: $this->isColor</p>";
    }
}
class EBook extends Release {
    use electronic;
    public $author;
    public function  __construct($title, $price, $pages, $publisher, $year, $fileSize, $author)
    {
        parent::__construct($title, $price, $fileSize, $pages, $publisher, $year);
        $this->author = $author;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Author: $this->author</p>";
    }
}
class EMagazine extends Subscription{
    use electronic;
}
class Poster extends Item{
    public $type;
    public $series;
    public function customize():void{
        echo "<p>A very original Poster of {$this->series}</p>";
    }
    public function __construct($title, $price, $size, $type, $series)
    {
        parent::__construct($title, $price, $size);
        $this->type = $type;
        $this->series = $series;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Type: $this->type</p><p>Series: $this->series</p>";
    }
}
class Postcard extends Item{
    public $country;
    public $series;
    public function __construct($title, $price, $size, $country, $series)
    {
        parent::__construct($title, $price, $size);
        $this->country = $country;
        $this->series = $series;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Country: $this->country</p><p>Series: $this->series</p>";
    }
}
class PostStamp extends Postcard {

    public $denomination;
    public function __construct($title, $price, $size, $country, $denomination, $series)
    {
        parent::__construct($title, $price, $size, $country, $series);
        $this->denomination = $denomination;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Denomination: $this->denomination</p>";
    }
}

class Calendar extends Item{
    public $year;
    public $type;
    public function __construct($title, $price, $size, $year, $type)
    {
        parent::__construct($title, $price, $size);
        $this->year =$year;
        $this->type =$type;
    }
    public function info(): void
    {
        parent::info();
        echo "<p>Year: $this->year</p><p>Type: $this->type</p>";
    }
}
//Tests
$GameOfThrones = new Book(17.96, "Song of Ice and fire", "Gorge R.R Martin", 1000, "Amazing", 1996, true, ["fantasy", "adventure", "magic"], ['width'=>30,'height'=>40]);
echo $GameOfThrones ->getGenres();
$GameOfThrones->info();
var_dump($GameOfThrones->size);
$GameOfThrones->reserve();

$Fishing = new Magazine("Fishing", 20.25, ['width'=>45,'height'=>60], 75, "Hobby literature", 2011, 80.75, 6, 42);
echo $Fishing->getPrice(333);
$Fishing->info();
$Fishing->reserve();

$TheTime= new Newspaper("The Times", 12.50, ['width'=>40,'height'=>30], 20, "News Corporation", 2020, 15.75, 360, 360000, true);

echo $TheTime->getPrice(777);
$TheTime->info();

$PathOfKings= new EBook("The Way Of Kings", 185.40, 1106, "Tor Books", 2010, 4.1, "Brandon Sanderson");
$PathOfKings->info();

$Health = new EMagazine("Health", 76, 7.3, 53, "MensHealth", 2020, 15.99, 5, 30);
$Health->info();

$Avengers = new Poster("Avengers", 35, ['width'=>80,'height'=>100], "advertisment", "Marvel");
$Avengers->info();
$Avengers->customize();

$Liberty = new Postcard("Statue of Liberty", 25, ['height'=>9, 'width'=>14], "USA", "Famous Monuments");
$Liberty->info();

$Admirals = new PostStamp("King Georg 5", 50, ['height'=>3,'width'=>2], "Canada", 50, "Admirals");
$Admirals->info();

$PoltavaPark = new Calendar("Parks of Poltava", 32.35, ['height'=>20, 'width'=>30],2020, "I don't know");
$PoltavaPark->info();
