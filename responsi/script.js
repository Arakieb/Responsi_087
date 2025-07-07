let timer = null;
let seconds = 0;

function updateDisplay() {
  const minutes = Math.floor(seconds / 60).toString().padStart(2, '0');
  const secs = (seconds % 60).toString().padStart(2, '0');
  document.getElementById('display').textContent = `${minutes}:${secs}`;
}

function startTimer() {
  if (!timer) {
    timer = setInterval(() => {
      seconds++;
      updateDisplay();
    }, 1000);
    setStatus("Timer dimulai.");
  }
}
function stopTimer() {
  if (timer) {
    clearInterval(timer);
    timer = null;
    setStatus(`Timer dihentikan sementara pada ${document.getElementById('display').textContent}.`);
  }
}
function submitTime() {
  const waktu = document.getElementById('display').textContent;
  document.getElementById('hiddenTime').value = waktu;
  document.getElementById('logForm').submit();
  setStatus(`Waktu ${waktu} dikirim ke server.`);
}
function resetTimer() {
  clearInterval(timer);
  timer = null;
  seconds = 0;
  updateDisplay();
  setStatus("Timer direset.");
}

function setStatus(msg) {
  document.getElementById('status').textContent = msg;
}
