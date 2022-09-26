"use strict";

/**
 * Represents the paddle of the game that moves horizontally with the mouse.
 */
class Paddle {

    /**
     * Initializes the right "left" according to the mouse (even when it goes out of the scene).
     *
     * @param {number} left paddle's gap from the left bord.
     */
    doLeft(left) {
        if (left < 0) {
            this._left = 0;
        } else if (left > Scene_Width - Paddle_Width) {
            this._left = Scene_Width - Paddle_Width;
        } else {
            this._left = left;
        }
    }

    /**
     * Constructor of the paddle.
     *
     * @param {number} left paddle's gap from the left bord.
     */
    constructor(left) {
        this.doLeft(left);
    }

    /**
     * Getter of paddle's gap.
     */
    get left() {
        return this._left;
    }

    /**
     * Moves the paddle by the given gap.
     *
     * @param {number} left paddle's gap from the left bord.
     */
    moveTo(left) {
        this.doLeft(left);
    }

}
