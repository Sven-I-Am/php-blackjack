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
    * created `index.php` with visualisation of cards, score, winner and buttons for player move :heavy_check_mark:
    * buttons work :heavy_check_mark:
    * score is live and winner is displayed at end of game :heavy_check_mark:  
    :exclamation: still have to separate the `dealer` into its own class
    * **FINAL** commit and push of the day at :clock6: 5:55PM
* Day 2 (:date: 29/10/2021)
  * short check-in with coach [Tim](https://github.com/Timmeahj) and the other learners at :clock: 9:00AM
  * get coding:
    * extended `Player` class into `Dealer` class :heavy_check_mark:
    * added method `dealerHit` that calls the `parent::hit()` method until the dealer hit 15 or up :heavy_check_mark:
    * adjusted code where needed to suit the changes and updated the winner checks in `index.php` :heavy_check_mark:
    * update README :heavy_check_mark:
    * **done with the required elements of the exercise, will start on the *nice to have* features after `git commit` and `git push`** :clock10: 9:55AM
    * implemented a betting system, new game resets chips to 100, new round keeps the chips. :heavy_check_mark:
    * most of the blackjack first works :heavy_check_mark:
    * :clock1: lunchtime commit and push :heavy_check_mark:
    * implemented the tie on first draw and tested :heavy_check_mark:  
:tada:**DONE?**:tada:

## To Do

This to do list is for my personal use, the full to do list is added at the start of the challenge and as I complete
objectives they will be moved up into the timeline section and ticked off using either emotes such as :heavy_check_mark: 
or the `checkbox` syntax [ ] [x] provided by markdown.

#### create the base classes :heavy_check_mark:
1. create class `Player` in the file `Player.php` :heavy_check_mark:
2. create a class `Blackjack` in the file `Blackjack.php` :heavy_check_mark:
3. In the constructor of the `Player` class expect `Deck` object passed from `Blackjack`class as parameter then draw 2 cards for the player using drawCard(). :heavy_check_mark:
4. Go back to the `Player` class and add requested logic in your empty methods: :heavy_check_mark:

#### create the index.php file :heavy_check_mark:
1. Create an index.php file: :heavy_check_mark:
2. Use buttons or links to send to the `index.php` page what the player's action is. :heavy_check_mark:

#### The dealer :heavy_check_mark:

1. extend the `player` class to a newly created `dealer` class to make the dealer have its own proper behavior.  :heavy_check_mark:
2. Change the `Blackjack` class to create a new `dealer` object instead of a `player` object for the property of the dealer. :heavy_check_mark:
3. Now create a `hit` function that keeps drawing cards until the dealer has at least 15 points. :heavy_check_mark:

#### Final push :heavy_check_mark:

1. **hit** button calls `hit` on player, then check the lost status of the player. :heavy_check_mark:
2. **stand** button calls `hit` on dealer, then check the lost status of the dealer. If he is not lost, compare scores to set the winner (If equal the dealer wins). :heavy_check_mark:
3. **Surrender**: the dealer auto wins. :heavy_check_mark:
4. Always display on the page the scores of both players. If you have a winner, display it. :heavy_check_mark:
5. End of the game: destroy the current `blackjack` variable so the game restarts. :heavy_check_mark:

# Nice to have
1. Implement a betting system :heavy_check_mark:
2. Implement the blackjack first turn rule :heavy_check_mark: