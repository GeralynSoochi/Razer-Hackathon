// retrieve 
async function generateBoss() {

    var serviceURL = "http://localhost:5003/getMainBoss"
    var QNA = []

    try {
        const response = await fetch(serviceURL, { method: 'GET' });
        const data = await response.json();

        for (x in data) {

            /// beauty work here 
            // each round is for one question 

            objectQuestion = data[x];

            for (i in objectQuestion) {
                QNA.push(objectQuestion[i]);
            }
            console.log(QNA)

        }
    } catch (error) {
        //   showError
        // ('There is a problem retrieving books data, please try again later.<br />' + error)
    }

    return QNA;
}

var displayarray = generateBoss();


const questionText = document.querySelector(".question-text");
const optionBox = document.querySelector(".option-box");
const currentQuestionNum = document.querySelector(".current-question-num");
const answerDescription = document.querySelector(".answer-description");
const nextQuestionBtn = document.querySelector(".next-question-btn");
const correctAnswers = document.querySelector(".correct-answers");
const seeResultBtn = document.querySelector(".see-result-btn");
const remainingTime = document.querySelector(".remaining-time");
const timeUpText = document.querySelector(".time-up-text");
const quizHomeBox = document.querySelector(".quiz-home-box");
//const quizHomeBox=document.querySelector(".quiz-home-box-completed");
const quizBox = document.querySelector(".quiz-box");
const quizOverBox = document.querySelector(".quiz-over-box");
//const startAgainQuizBtn=document.querySelector(".start-again-quiz-btn");
const goHomeBtn = document.querySelector(".go-home-btn");
const startQuizBtn = document.querySelector(".start-quiz-btn");
let attempt = 0;
let questionIndex = 0;
let score = 0;
let number = 0;
let myArray = [];
let interval;

//questions and options and answer and answer description
//array of objects
myApp = [{
        question: "Which organ belongs to the Digestive System:",
        options: ["Thymus", "Stomach", "Heart", "Trachea"],
        answer: 1,
    },
    {
        question: "Adults have fewer bones than babies do:",
        options: ["true", "false"],
        answer: 0,
        description: "Lots of bones start out as several fragments at birth,then fuse together into a single bone later in life"
    },
    {
        question: "Our human body has.........",
        options: ["206 bones", "210 bones", "306 bones", "706 bones"],
        answer: 0,
    },
    {
        question: "Your fingernails and hair keep growing after you die.",
        options: ["true", "false"],
        answer: 1,
        description: "They really don't"
    },
    {
        question: "One important function of bones is to produce.",
        options: ["tendons", "ligaments", "blood cells", "cartilage"],
        answer: 2,
    }

]

function load() {
    number++;
    questionText.innerHTML = myApp[questionIndex].question;
    createOptions();
    scoreBoard();
    currentQuestionNum.innerHTML = number + " / " + myApp.length;
}

function createOptions() {
    optionBox.innerHTML = "";
    let animationDelay = 0.2;
    for (let i = 0; i < myApp[questionIndex].options.length; i++) {
        const option = document.createElement("div");
        option.innerHTML = myApp[questionIndex].options[i];
        option.classList.add("option");
        option.id = i;
        option.style.animationDelay = animationDelay + "s";
        animationDelay = animationDelay + 0.2;
        option.setAttribute("onclick", "check(this)");
        optionBox.appendChild(option);
    }
}

function generateRandomQuestion() {
    const randomNumber = Math.floor(Math.random() * myApp.length);
    let hitDuplicate = 0;
    if (myArray.length == 0) {
        questionIndex = randomNumber;
    } else {
        for (let i = 0; i < myArray.length; i++) {
            if (randomNumber == myArray[i]) {
                //if duplicate found
                hitDuplicate = 1;
            }
        }
        if (hitDuplicate == 1) {
            generateRandomQuestion();
            return;
        } else {
            questionIndex = randomNumber;
        }
    }

    myArray.push(randomNumber);
    console.log(myArray);
    load();
}

function check(ele) {
    const id = ele.id;
    if (id == myApp[questionIndex].answer) {
        ele.classList.add("correct");
        score++;
        scoreBoard();
    } else {
        ele.classList.add("wrong");
        //show correct option when clicked answer is wrong
        for (let i = 0; i < optionBox.children.length; i++) {
            if (optionBox.children[i].id == myApp[questionIndex].answer) {
                optionBox.children[i].classList.add("show-correct");
            }
        }
    }
    attempt++;
    disableOptions()
    showAnswerDescription();
    showNextQuestionBtn();
    stopTimer();

    if (number == myApp.length) {
        quizOver();
    }
}

function timeIsUp() {
    showTimeUpText();
    //when time is up show correct answer
    for (let i = 0; i < optionBox.children.length; i++) {
        if (optionBox.children[i].id == myApp[questionIndex].answer) {
            optionBox.children[i].classList.add("show-correct");
        }
    }

    disableOptions()
    showAnswerDescription();
    showNextQuestionBtn();

    if (number == myApp.length) {
        quizOver();
    }
}

function startTimer() {
    let timeLimit = 15;
    remainingTime.innerHTML = timeLimit;
    remainingTime.classList.remove("less-time");
    interval = setInterval(() => {
        timeLimit--;
        if (timeLimit < 10) {
            timeLimit = "0" + timeLimit;
        }
        if (timeLimit < 6) {
            remainingTime.classList.add("less-time");
        }
        remainingTime.innerHTML = timeLimit;
        if (timeLimit == 0) {
            clearInterval(interval);
            timeIsUp();
        }
    }, 1000)
}

function stopTimer() {
    clearInterval(interval);
}

function disableOptions() {
    for (let i = 0; i < optionBox.children.length; i++) {
        optionBox.children[i].classList.add("already-answered");
    }
}

function showAnswerDescription() {
    if (typeof myApp[questionIndex].description !== "undefined") {
        answerDescription.classList.add("show");
        answerDescription.innerHTML = myApp[questionIndex].description;
    }

}

function hideAnswerDescription() {
    answerDescription.classList.remove("show");
    answerDescription.innerHTML = "";
}

function showNextQuestionBtn() {
    nextQuestionBtn.classList.add("show");
}

function hideNextQuestionBtn() {
    nextQuestionBtn.classList.remove("show");
}

function showTimeUpText() {
    timeUpText.classList.add("show");
}

function hideTimeUpText() {
    timeUpText.classList.remove("show");
}

function scoreBoard() {
    correctAnswers.innerHTML = score * 20;
}

nextQuestionBtn.addEventListener("click", nextQuestion);

function nextQuestion() {
    generateRandomQuestion();
    hideNextQuestionBtn();
    hideAnswerDescription();
    hideTimeUpText();
    startTimer();
}

function quizResult() {
    document.querySelector(".total-questions").innerHTML = myApp.length;
    document.querySelector(".total-correct").innerHTML = score;
    document.querySelector(".total-wrong").innerHTML = attempt - score;
    const percentage = (score / myApp.length) * 100;
    document.querySelector(".percentage").innerHTML = percentage.toFixed(2) + "%";
    document.querySelector(".dmg-dealt").innerHTML = score * 20;
}

function resetQuiz() {
    attempt = 0;
    //questionIndex=0;
    score = 0;
    number = 0;
    myArray = [];
}

function quizOver() {
    nextQuestionBtn.classList.remove("show");
    seeResultBtn.classList.add("show");
}

seeResultBtn.addEventListener("click", () => {
    quizBox.classList.remove("show");
    seeResultBtn.classList.remove("show");
    quizOverBox.classList.add("show");
    quizResult();
})

// startAgainQuizBtn.addEventListener("click", ()=>{
//     quizBox.classList.add("show");
//     quizOverBox.classList.remove("show");
//     resetQuiz();
//     nextQuestion()
// })

goHomeBtn.addEventListener("click", () => {
    quizOverBox.classList.remove("show");
    quizHomeBox.classList.add("show");
    resetQuiz();
})

startQuizBtn.addEventListener("click", () => {
    quizHomeBox.classList.remove("show");
    quizBox.classList.add("show");
    nextQuestion();
})

// window.onload=()=>{

// }