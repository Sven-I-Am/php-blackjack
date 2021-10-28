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

## To Do

This to do list is for my personal use, the full to do list is added at the start of the challenge and as I complete
objectives they will be moved up into the timeline section and ticked off using either emotes such as :heavy_check_mark: 
or the `checkbox` syntax [ ] [x] provided by markdown.

#### create the base classes :x:
1. create class `player` in the file `player.php` :x:
   * add 2 private properties :x:
     1. `cards` array :x:
     2. `lost` boolean :x:
   * add empty public methods :x:
     1. `hit` :x:
     2. `surrender` :x:
     3. `geScore` :x:
     4. `hasLost` :x:
2. create a class `Blackjack` in the file `Blackjack.php` :x:
   * add 3 private properties :x:
     1. `player` (Player) :x:
     2. `dealer` (Player for now) :x:
     3. `deck` (Deck) :x:
   * Add the following public methods: :x:
     1. `getPlayer` (returns the player object) :x:
     2. `getDealer` (returns the dealer object) :x:
     3. `getDeck` (returns the deck object) :x:
   * In the constructor do the following: :x:
     1. Instantiate the Player class twice, insert it into the `player` property and a `dealer` property. :x:
     2. Create a new `deck` object (code has already been written for you!). :x:
     3. Shuffle the cards with `shuffle` method on `deck`. :x:
3. In the constructor of the `Player` class :x:
   * Make it expect the `Deck` object as a parameter. :x:
   * Pass this `Deck` from the `Blackjack` constructor. :x:
   * Now draw 2 cards for the player. You have to use an existing method for this from the Deck class. :x:
4. Go back to the `Player` class and add the following logic in your empty methods: :x:
   * `getScore` loops over all the cards and return the total value of that player. :x:
   * `hasLost` will return the `bool` of the lost property. :x:
   * `hit` should add a card to the player. If this brings him above 21, set `lost` property to `true`. :x:
     1. To count his score use the method `getScore` you wrote earlier. :x:
     2. This method should expect the `$deck` variable as an argument from outside, to draw the card. :x:
        * (optional) For bonus points make the number 21 a class constant: this is a magical value we want to avoid. :x:
     3. `surrender` should make you surrender the game. (Dealer wins.) This sets the property `lost` in the `player` instance to true. :x:
     4. `stand` does not have a method in the player class but will instead call hit on the `dealer` instance. (you have to do nothing here) :x:

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