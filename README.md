# Object Oriented Programming - Blackjack
### exercise in week 6 (25/10/2021 - 29/10/2021) of my BeCode training
## Challenge

Code a blackjack game in PHP. Use classes and objects to keep the code structured.
Some starter classes were provided by [BeCode](https://github.com/becodeorg/ANT-Lamarr-5.34/tree/main/2.The-Hill/php/4.oop-blackjackgame/code)

## The objective of this exercise

* We're taking our first steps into OOP (Object-Oriented Programming)
  * create our own classes and objects
  * learn the use of `GETTERS`
  * the difference between `PUBLIC` and `PRIVATE` properties and methods
  * using `constructors`
  * using separate files for each class and linking all the files together in the `index.php`

## Tools and languages used

|  | Description |
| ----------- | ----------- |
| ![ubuntu](IMG/ubuntu-logo.png) | Running Ubuntu 20.04 |
| ![php-storm](IMG/phpstorm-logo.jpeg) | Working with PHPStorm as IDE |
| ![php](IMG/php-logo.jpg) | Main language used is PHP |
| ![git](IMG/git-logo.png) | Using git for version control |
| ![github](IMG/github-logo.png) | Hosting my files on github |

## Code provided by BeCode

* Card.php :arrow_forward: holds the `class Card`
* Deck.php :arrow_forward: holds the `class Deck`
* Suit.php :arrow_forward: holds the `class Suit`
* example.php :arrow_forward: gives an example on how to call the 3 classes provided into our browser from a centralized file

## Timeline

* Day 1 (:date:28/10/2021)
  * assignment was given at 9AM with short briefing and Q&A by coach [Sicco](https://github.com/Sick-0)
  * created the `php-blackjack` repository on gitHub and `git clone` to local device
  * read through the [readme](https://github.com/becodeorg/ANT-Lamarr-5.34/blob/main/2.The-Hill/php/4.oop-blackjackgame/README.md) to understand the mission objective
  * created this readme for an overview of the exercise and to keep track of progress
  * what got done so far:
    * created file structure :heavy_check_mark:
    * created .gitignore to ignore .idea folder :heavy_check_mark:
    * created index.php file :heavy_check_mark:
    * first commit and push of the project at 10:40AM :heavy_check_mark:
    * created class `Player` in file `Player.php` :heavy_check_mark:
      * private properties added :heavy_check_mark:
      * empty public methods added :heavy_check_mark:
        * was confused at first because of the use of 'methods' rather than 'functions', but I found [this discussion on stackoverflow](https://stackoverflow.com/questions/22913321/why-functions-are-called-methods-in-java) that cleared up my confusion
    * created class 'Blackjack' in file 'Blackjack.php' :heavy_check_mark:
      * private properties added :heavy_check_mark:
      * public methods added that return their respective objects :heavy_check_mark:
      * added constructor method to:
        * initiate property `$player` from class `Player` :heavy_check_mark:
        * initiate property `$dealer` from class `Player` (for now) :heavy_check_mark:
        * initiate property `$deck` from the `Deck` class :heavy_check_mark:
        * `shuffle` said `$deck` :heavy_check_mark:  
**:question: the constructor method confused the hell out of me, I couldn't figure out how to test if what I was coding was right so I took a step back and started over. I created a test.php file to check the output of the Blackjack class versus the example code. and it works!:sunglasses:**
      * update `README`  :heavy_check_mark:
    * created the `constructor` in class `Player`:heavy_check_mark:
      * made it expect object `Deck` passed from `Blackjack` as parameter :heavy_check_mark:  
      **:exclamation: I had to switch some things around in the `Blackjack` constructor in order to pass the $deck object to `Player`**
      * draw 2 cards for `Player` using `drawCard()` method from class `Deck` :heavy_check_mark:
    * add functionality to methods in class `Player`
      * getScore() :heavy_check_mark:  
      :exclamation: something strange is going on with the score maths, keep an eye on it!
      * hasLost() keeps track of `bool $lost` :heavy_check_mark:
      * hit() adds card to player hand and auto checks score for loss condition :heavy_check_mark:
      * surrender() sets `bool $lost = true` :heavy_check_mark:
      * stand() added but empty, future me can figure that out later :heavy_check_mark:
:date:28/10/2021 :clock4: 3:50PM
:tada:I finished the base classes part of the exercise:tada:

## To Do

This to do list is for my personal use, the full to do list is added at the start of the challenge and as I complete
objectives they will be moved up into the timeline section and ticked off using either emotes such as :heavy_check_mark: 
or the `checkbox` syntax [ ] [x] provided by markdown.

#### create the base classes :heavy_check_mark:
1. create class `Player` in the file `Player.php` :heavy_check_mark:
2. create a class `Blackjack` in the file `Blackjack.php` :heavy_check_mark:
3. In the constructor of the `Player` class expect `Deck` object passed from `Blackjack`class as parameter then draw 2 cards for the player using drawCard(). :heavy_check_mark:
4. Go back to the `Player` class and add requested logic in your empty methods: :heavy_check_mark:

#### create the index.php file :x:
1. Create an index.php file: :x:
   * Require all the files with the classes you already created. :x:
   * Start the PHP session :x:
   * If the session does not have a `Blackjack` variable yet: :x:
     1. Create a new `Blackjack` object. :x:
     2. Put the `Blackjack` object in the session :x:
2. Use buttons or links to send to the `index.php` page what the player's action is. :x:

#### The dealer :x:

1. [extend](https://www.php.net/manual/en/language.oop5.inheritance.php) the `player` class and extend it to a newly created `dealer` class to make the dealer have its own proper behavior.  :x:
2. Change the `Blackjack` class to create a new `dealer` object instead of a `player` object for the property of the dealer. :x:
3. Now create a `hit` function that keeps drawing cards until the dealer has at least 15 points. :x:
   * The tricky part is that we also need the `lost` check we already had in the `hit` function of the player without duplicating code :x:

#### Final push :x:

1. **hit** button calls `hit` on player, then check the lost status of the player. :x:
   * pass a `Deck` variable to this function, use the `Blackjack::getDeck()` method for this. :x:
2. **stand** button calls `hit` on dealer, then check the lost status of the dealer. If he is not lost, compare scores to set the winner (If equal the dealer wins). :x:
3. **Surrender**: the dealer auto wins. :x:
4. Always display on the page the scores of both players. If you have a winner, display it. :x:
5. End of the game: destroy the current `blackjack` variable so the game restarts. :x:

# Nice to have
1. Implement a betting system :x:
   * Every new player (new session) starts with 100 chips :x:
   * After the player gets his 2 first cards every round ask how much he wants to bet. He needs to bet at least 5 chips. :x:
   * If the player wins the bet he gains double the amount of chips. :x:
2. Implement the blackjack first turn rule: if the player draws 21 the first turn: he directly wins. If the dealer draws 21 the first turn, he wins. If both draw it, it is a tie.  :x:
   1. When you implement both nice to have features, a blackjack means an auto win of 10 chips, a blackjack of the dealer a loss of 5 chips for the player. :x: