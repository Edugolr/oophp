<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
namespace Chai17\Guess;

class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */

    private $number;
    private $tries;


    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct($number = -1, $tries = 6)
    {
        $this->number = $number;
        $this->tries = $tries;
    }



    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    public function random()
    {
        $this->tries = 6;
        $this->number = mt_rand(1, 100);
    }



    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */

    public function tries()
    {
        return $this->tries;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }



    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess($number)
    {
        if ($number < 1 || $number > 100) {
            throw new GuessException("Your guess must be inbetween 1 and 100");
        }
        if ($this->tries > 0) {
            --$this->tries;
            if ($number > $this->number) {
                return "To high";
            } elseif ($number < $this->number) {
                return "To low";
            } else {
                return "Correct";
            }
        } else {
            return "No guesses remains";
        }
    }
}
