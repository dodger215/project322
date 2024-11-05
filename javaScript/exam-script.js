// Countdown timer
const timer = document.getElementById('time');
let timeLeft = 59 * 60; // 59 minutes in seconds

const updateTimer = () => {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    if (timeLeft > 0) {
        timeLeft--;
    } else {
        clearInterval(timerInterval);
        alert('Time is up!');
        // Optionally auto-submit the exam here
    }
};

const timerInterval = setInterval(updateTimer, 1000);
