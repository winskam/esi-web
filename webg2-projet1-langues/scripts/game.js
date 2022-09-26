const id = getQuiz();
let num = 1;
let score = 0;

/**
 * Returns the quiz id and puts it in the URL.
 */
function getQuiz() {
    return new URL(location.href).searchParams.get("id");
}

/**
 * Takes the quiz theme and write it in the right place on the page.
 */
function gameDescription() {
    for (let i = 0; i < data.length; i++) {
        if (data[i].id === id) {
            $("#theme").text(`Quiz sur le thème : ${data[i].description}`);
        }
    }
}

/**
 * Shuffles the words proposed for the answer.
 * 
 * @param {*[]} splitTotal all the words to shuffle.
 */
function shuffle(splitTotal) {
    let counter = splitTotal.length;
    while (counter > 0) {
        const index = Math.floor(Math.random() * counter);
        counter--;
        [splitTotal[counter], splitTotal[index]] = [splitTotal[index], splitTotal[counter]];
    }
}

/**
 * Moves the words chosen by the user in the answer frame.
 */
function movetoAnswer() {
    if ($(this).parent().is("#suggWords")) {
        $(this).detach()
        $("#answerFrame").append(this);
    } else {
        $(this).detach()
        $("#suggWords").append(this);
    }
}

/**
 * Adds question and words (button) for the answer.
 */
function gameQuestion() {
    for (let i = 0; i < data.length; i++) {
        if (data[i].id === id) {
            $("#question").text(`Question ${num} : ${data[i].questions[num - 1].question}`);
            const splitAnswer = data[i].questions[num - 1].answer.split(" ");
            const splitExtras = data[i].questions[num - 1].extras.split(" ");
            const splitTotal = splitAnswer.concat(splitExtras);
            shuffle(splitTotal);
            for (let j = 0; j < splitTotal.length; j++) {
                $("#suggWords").append($("<button>")
                    .addClass("word")
                    .text(splitTotal[j])
                    .click(movetoAnswer));
            }
        }
    }
}

/**
 * Checks if the sentence proposed by the user is correct.
 */
function testSentence() {
    for (let i = 0; i < data.length; i++) {
        if (data[i].id === id) {
            const answer = data[i].questions[num - 1].answer.split(" ");
            const answerUser = $("#answerFrame").children();
            let arrayUser = [];
            for (let a = 0; a < answerUser.length; a++) {
                arrayUser.push(answerUser.eq(a).text());
            }
            if (arrayUser.length === answer.length) {
                let arraysEquals = true;
                for (let j = 0; j < answer.length; j++) {
                    arraysEquals = arraysEquals && (answer[j] == arrayUser[j]);
                }
                if (arraysEquals) {
                    score++;
                    $("#answerFrame").addClass("green");
                } else {
                    $("#answerFrame").addClass("red");
                    $("#correctAnswer").addClass("green");
                    $("#correctAnswer").removeClass("hidden");
                    $("#correctAnswer").text(data[i].questions[num - 1].answer);
                }
            } else {
                $("#answerFrame").addClass("red");
                $("#correctAnswer").addClass("green");
                $("#correctAnswer").removeClass("hidden");
                $("#correctAnswer").text(data[i].questions[num - 1].answer);
            }
        }
    }
}

/**
 * Moves on to the next question.
 */
function nextQuestion() {
    num++;
    gameQuestion();
}

/**
 * Counts the number of questions in the chosen quiz.
 */
function nbQuestions() {
    for (let i = 0; i < data.length; i++) {
        if (data[i].id === id) {
            return data[i].questions.length;
        }
    }
}

/**
 * Acts when the user clicks on the test button.
 */
function buttonTest() {
    $("#test").click(function () {
        testSentence();
        $("#test").addClass("hidden");
        $(".word").attr("disabled", true);
        if (num < nbQuestions()) {
            $("#next").removeClass("hidden");
        } else {
            endGame();
        }
    });
}

/**
 * Acts when the user clicks on the next question button.
 */
function buttonNext() {
    $("#next").click(function () {
        $("#test").removeClass("hidden");
        $("#next").addClass("hidden");
        $("#answerFrame").removeClass("red");
        $("#answerFrame").removeClass("green");
        $(".word").remove();
        $("#correctAnswer").addClass("hidden");
        nextQuestion();
    })
}

/**
 * Acts when the user clicks on the again button.
 */
function buttonAgain() {
    $("#again").click(function () {
        location = location;
    })
}

/**
 * Acts when the user clicks on the other quiz button.
 */
function buttonOther() {
    $("#other").click(function () {
        window.open("accueil.html", "_self");
    })
}

/**
 * End-of-game button layout.
 */
function endGame() {
    $("#again").removeClass("hidden");
    $("#other").removeClass("hidden");
    $("#score").removeClass("hidden");
    $("#score").text(`Votre score : ${score} / ${nbQuestions()}`);
}

$(document).ready(function () {
    gameDescription();
    gameQuestion();
    buttonTest();
    buttonNext();
    buttonAgain();
    buttonOther();
});
