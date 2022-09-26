"use strict";

/**
 * Represents the ball of the game that moves horizontally and vertically.
 */
class Ball {

    /**
     * Constructor of the ball.
     *
     * @param {number} x position of the ball from the left board.
     * @param {number} y position of the ball from the top board.
     * @param {number} dx direction of the ball horizontally.
     * @param {number} dy direction of the ball vertically.
     */
    constructor(x, y, dx, dy) {
        if (x < 0 || y < 0 || x > Scene_Width || y > Scene_Height) {
            throw new Error("Incorrect position of the ball");
        } else {
            this._x = x;
            this._y = y;
            this._dx = dx;
            this._dy = dy;
        }
    }

    /**
     * Getter of ball's gap from the left.
     */
    get x() {
        return this._x;
    }

    /**
     * Getter of ball's gap from the top.
     */
    get y() {
        return this._y;
    }

    /**
     * Returns the opposite direction horizontally.
     */
    _reverseX() {
        this._dx = -this._dx;
    }

    /**
     * Returns the opposite direction vertically.
     */
    _reverseY() {
        this._dy = -this._dy;
    }

    /**
     * Moves the ball in the right direction.
     */
    move() {
        if (this._x - Ball_Width / 2 < 0 || this._x + Ball_Width / 2 > Scene_Width) {
            this._reverseX();
        } else if (this._y - Ball_Height / 2 < 0 || this._y + Ball_Height / 2 > Scene_Height) {
            this._reverseY();
        }

        this._x = this._x + this._dx;
        this._y = this._y + this._dy;
    }

    /**
     * Returns the opposite direction vertically when the ball hits the paddle.
     */
    hitPaddle() {
        this._reverseY();
    }

    /**
     * Returns the right direction when the ball hits a brick.
     *
     * @param {Brick} brick of the wall.
     */
    hitBrick(brick) {
        if ((this.y - Ball_Height / 2 <= brick.y + Brick_Height
            || this.y + Ball_Height / 2 >= brick.y)
            && this.x + Ball_Width / 2 >= brick.x
            && this.x - Ball_Width / 2 <= brick.x + Brick_Width) {
            this._reverseY();
        } else {
            this._reverseX();
        }
    }

    /**
     * Replaces the ball when it hits the floor.
     */
    replace() {
        this._x = Scene_Width / 2;
        this._y = Scene_Height / 2;
    }

    /**
     * Increases the speed of the ball.
     */
    speedUp() {
        this._dx += 0.4;
        this._dy += 0.4;
    }

}
