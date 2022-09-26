"use strict";

/**
 * Displays the paddle on the scene with the correct gap.
 *
 * @param {Paddle} paddle to display.
 */
function displayPaddle(paddle) {
    $("#paddle").css("left", `${paddle.left}px`);
}

/**
 * Displays the ball on the scene with the correct gap.
 *
 * @param {Ball} ball to display.
 */
function displayBall(ball) {
    $("#ball").css("left", `${ball.x - Ball_Width / 2}px`)
        .css("top", `${ball.y - Ball_Height / 2}px`);
}

/**
 * Displays the brick wall.
 *
 * @param {Brick[]} wall to display.
 */
function displayBricks(wall) {
    for (let i = 0; i < wall.length; i++) {
        $(".brickWall").append($("<div>")
            .addClass("brick")
            .css("width", `${Brick_Width}px`)
            .css("height", `${Brick_Height}px`)
            .css("left", `${wall[i].x}px`)
            .css("top", `${wall[i].y}px`)
            .attr("id", `${wall[i].id}`));
    }
}

/**
 * Removes the brick from the wall that has been hit.
 *
 * @param {number} id of the brick.
 */
function removeDisplayBrick(id) {
    $(`#${id}`).remove();
}

/**
 * Displays the number of lives remaining to the player.
 *
 * @param {number} lives remaining.
 */
function displayLives(lives) {
    for (let i = 0; i < lives; i++) {
        $("#infos").append($("<span>")
            .addClass("heart"));
    }
}

/**
 * Removes a heart when the ball hits the floor.
 */
function removeDisplayLives() {
    $(".heart:last").remove();
}

/**
 * Displays the level played.
 *
 * @param {number} level played.
 */
function updateLevel(level) {
    $("#level").text(level);
}

/**
 * Displays the score of the player.
 *
 * @param {number} score of the player.
 */
function updateScore(score) {
    $("#score").text(score);
}

/**
 * Hides the start message when the game has started.
 */
function hiddenMessage() {
    $(".message").addClass("hidden");
}

/**
 * Displays a message when the game is lost.
 */
function displayLostGame() {
    $("#lostGame").removeClass("hidden");
}
