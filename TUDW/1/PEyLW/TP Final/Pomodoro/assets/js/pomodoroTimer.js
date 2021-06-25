const secondsInMin = 60;
const mins_25 = 25 * secondsInMin;
const mins_15 = 15 * secondsInMin;
const mins_5 = 5 * secondsInMin;

let isRunning = false;
let interval;
let currentDuration = mins_25;
let timeLeft = 0;
let countdownWasStarted = false;

const playPauseButton = document.getElementById("playPause");

function playPause() {
  isRunning = !isRunning;

  if (!countdownWasStarted) {
    resetCountdown();
    updateString();
  }

  countdownWasStarted = true;

  if (isRunning) {
    interval = setInterval(updateCountdown, 1000);
    playPauseButton.innerHTML = "Pausar";
  } else {
    stopCountdown();
    bellRing();
    playPauseButton.innerHTML = "Iniciar";
  }
}

function bellRing(){
  var bell = document.getElementById("bell");
  bell.play();
}

function updateCountdown() {
  if (!isRunning) {
    return;
  }

  timeLeft--;
  updateString();

  if (timeLeft == 0) {
    playPause();
    stopCountdown();
    timeLeft = currentDuration;
    updateString();
    isRunning = false;
  }
}

function stopCountdown() {
  clearInterval(interval);
}

function resetCountdown() {
  isRunning = true;
  timeLeft = currentDuration;
}

//Button Handler
function updateDuration(mins) {
  if (isRunning) {
    playPause();
  }
  if (mins == 15) {
    currentDuration = mins_15;
  } else if (mins == 5) {
    currentDuration = mins_5;
  } else {
    currentDuration = mins_25;
  }

  timeLeft = currentDuration;
  isRunning = false;
  updateString();
}

// Visual Changes
function updateString() {
  let minutes = Math.floor(timeLeft / secondsInMin);
  let seconds = timeLeft % secondsInMin;
  
  if (minutes < 10) {
    minutesString = "0" + minutes;
  } else {
    minutesString = minutes;
  }

  if (seconds < 10) {
    secondsString = "0" + seconds;
  } else {
    secondsString = seconds;
  }

  document.getElementById("timer").innerHTML = minutesString + ":" + secondsString;
}