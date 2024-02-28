import { showModal, closeModal } from './modal-functions.mjs';

// Initialize variables
let [seconds, minutes, hours] = [0, 0, 0];
const time = document.querySelector("#time");
let timer = null;
let selectedActivity;

// DOM elements
const startBtn = document.querySelector("#startBtn");
const pauseBtn = document.querySelector("#pauseBtn");
const resetBtn = document.querySelector("#resetBtn");
const activitieSelect = document.querySelector(".activities-select");

// Stopwatch function
function stopwatch() {
    seconds++;
    if (seconds == 60) {
        seconds = 0;
        minutes++;
        if (minutes == 60) {
            minutes = 0;
            hours++;
        }
    }
    // Format time display
    let h = hours < 10 ? "0" + hours : hours;
    let m = minutes < 10 ? "0" + minutes : minutes;
    let s = seconds < 10 ? "0" + seconds : seconds;
    time.innerHTML = `${h}:${m}:${s}`;
}

// Start stopwatch
function watchStart() {
    if (timer != null) {
        clearInterval(timer);
    }
    stopwatch();
    timer = setInterval(stopwatch, 1000);
    startBtn.innerHTML = "Save";
    activitieSelect.disabled = true;
}

// Stop stopwatch
function watchStop() {
    clearInterval(timer);
}

// Reset stopwatch
function watchReset() {
    clearInterval(timer);
    seconds = 0;
    minutes = 0;
    hours = 0;
    time.innerHTML = "00:00:00";
    activitieSelect.disabled = false;
}

// Save progress function
function saveProgress() {
    // Get selected activity
    selectedActivity = activitieSelect.options[activitieSelect.selectedIndex].text;
    const typeOfActivity = document.getElementById("type-of-activity");
    typeOfActivity.innerHTML = selectedActivity;

    // Display time reached
    let timeReached = `${hours < 10 ? "0" + hours : hours}:${minutes < 10 ? "0" + minutes : minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
    const workoutResult = document.getElementById('workout-result');
    workoutResult.innerHTML = timeReached;

    // Save result
    const saveResultBtn = document.getElementById('saveResultBtn');
    saveResultBtn.addEventListener("click", function() {
        userActivities(timeReached, selectedActivity);
        closeModal();
        watchReset()
        startBtn.innerHTML = "Start";

    });
}

// Event listeners
startBtn.addEventListener("click", () => {
    if (startBtn.innerHTML === "Start") {
        watchStart();
    } else {
        showModal();
        saveProgress();
        watchReset();
    }
});

pauseBtn.addEventListener("click", watchStop);

resetBtn.addEventListener("click", watchReset);

const closeBtn = document.querySelector(".close-btn-controler");
closeBtn.addEventListener("click", closeModal);

// Function to send user activities to the server
function userActivities(timeReached, selectedActivity) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    }
    xhr.open("POST", "php/user-activities.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    let data = {
        timeReached: timeReached,
        selectedActivity: selectedActivity
    };
    xhr.send(JSON.stringify(data));
}
