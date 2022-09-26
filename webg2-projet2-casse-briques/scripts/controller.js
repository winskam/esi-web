"use strict";

/**
 * Checks if the ball touches the paddle.
 *
 * @param {Ball} ball of the game to check.
 * @param {Paddle} paddle of the game that is hit.
 */
function isTouching(ball, paddle) {
    return ball.y + Ball_Height / 2 >= Scene_Height - Paddle_Height
        && ball.x - Ball_Width / 2 <= paddle.left + Paddle_Width
        && ball.x + Ball_Width / 2 >= paddle.left;
}

/**
 * Checks if the ball touches the floor.
 *
 * @param {Ball} ball of the game to check.
 */
function touchFloor(ball) {
    return ball.y + Ball_Height / 2 >= Scene_Height;
}

/**
 * Builds a brick wall.
 */
function brickWall() {
    const wall = [];
    let id = 0;
    for (let i = 0; i < Bricks_Rows; i++) {
        for (let j = 0; j < Bricks_Columns; j++) {
            const brick = new Brick(j * Brick_Width, i * Brick_Height, id);
            wall.push(brick);
            id++;
        }
    }

    return wall;
}

/**
 * Checks if there is a collision between the ball and a brick.
 *
 * @param {Brick[]} wall an array with the bricks representing the wall.
 * @param {Ball} ball of the game.
 */
function collision(wall, ball) {
    const brickArray = [];
    let hitABrick = false;
    for (let i = 0; i < wall.length; i++) {
        if (ball.x + Ball_Width / 2 >= wall[i].x
            && ball.x - Ball_Width / 2 <= wall[i].x + Brick_Width
            && ball.y - Ball_Height / 2 <= wall[i].y + Brick_Height
            && ball.y + Ball_Height / 2 >= wall[i].y) {
            brickArray.push(wall[i]);
            if (!hitABrick) {
                ball.hitBrick(wall[i]);
            }
            hitABrick = true;
        }
    }

    return brickArray;
}

/**
 * Removes the bricks hit by the ball.
 *
 * @param {Brick[]} wall of bricks.
 * @param {Brick} brick to remove.
 */
function removeBrick(wall, brick) {
    wall.splice(wall.indexOf(brick), 1);
    removeDisplayBrick(brick.id);
}

/**
 * Checks if the wall still contains bricks or not.
 *
 * @param {Brick[]} wall of bricks.
 */
function wonLevel(wall) {
    return wall.length < 1;
}

$(document).ready(() => {
    const paddle = new Paddle(Scene_Width / 2 - Paddle_Width / 2);
    const ball = new Ball(Scene_Width / 2, Scene_Height - Paddle_Height - Ball_Height / 2 - 1, 2, 1);
    let wall = brickWall();
    const player = new Player();
    let level = 1;

    displayPaddle(paddle);
    displayBall(ball);
    displayBricks(wall);
    displayLives(player.lives);
    updateLevel(level);
    updateScore(player.score);

    $(document).one("click", function () {
        hiddenMessage();
        $(document).mousemove(function (e) {
            const posMouse = e.clientX - Paddle_Width / 2;
            const newMove = posMouse - $("#scene").offset().left;
            paddle.moveTo(newMove);
            displayPaddle(paddle);
        });

        const intervalId = setInterval(() => {
            ball.move();
            displayBall(ball);
            if (isTouching(ball, paddle)) {
                ball.hitPaddle();
            } else if (touchFloor(ball)) {
                player.removeLives();
                removeDisplayLives();
                ball.replace();
            }
            const brickArray = collision(wall, ball);
            for (let i = brickArray.length - 1; i >= 0; i--) {
                removeBrick(wall, brickArray[i]);
                player.addToScore(25);
                updateScore(player.score);
            }
            if (!player.stillAlive()) {
                clearInterval(intervalId);
                displayLostGame();
            } else if (wonLevel(wall)) {
                wall = brickWall();
                displayBricks(wall);
                player.addLife();
                displayLives(1);
                ball.replace();
                ball.speedUp();
                level++;
                updateLevel(level);
            }
        }, 10);
    });
});
