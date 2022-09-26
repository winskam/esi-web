"use strict";

/**
 * Represents the brick of the game to be destroyed.
 */
class Brick {

    /**
     * Constructor of the brick.
     *
     * @param {number} x position of the brick from the left bord.
     * @param {number} y position of the brick from the top bord.
     * @param {number} id of the brick.
     */
    constructor(x, y, id) {
        if (x < 0 || y < 0 || x > Scene_Width - Brick_Width || y > Scene_Height - Brick_Height) {
            throw new Error("Incorrect position of the brick.");
        } else {
            this._x = x;
            this._y = y;
            this._id = id;
        }
    }

    /**
     * Getter for the position of the brick from the left bord.
     */
    get x() {
        return this._x;
    }

    /**
     * Getter for the position of the brick from the top bord.
     */
    get y() {
        return this._y;
    }

    /**
     * Getter for the id of the brick.
     */
    get id() {
        return this._id;
    }

}
