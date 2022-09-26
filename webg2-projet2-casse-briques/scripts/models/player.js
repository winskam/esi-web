"use strict";

/**
 * Represents the player with his score;
 */
class Player {

    /**
     * Constructor of the player.
     */
    constructor() {
        this._score = 0;
        this._lives = 3;
    }

    /**
     * Getter of the score.
     */
    get score() {
        return this._score;
    }

    /**
     * Getter for the number of lives of the player.
     */
    get lives() {
        return this._lives;
    }

    /**
     * Adds points to the player's score.
     *
     * @param {number} points earned by the player during the game.
     */
    addToScore(points) {
        this._score += points;
    }

    /**
     * Takes a life from the player.
     */
    removeLives() {
        this._lives--;
    }

    /**
     * Adds a life to the player.
     */
    addLife() {
        this._lives++;
    }

    /**
     * Checks if the player still has lives.
     */
    stillAlive() {
        return this._lives > 0;
    }

}
