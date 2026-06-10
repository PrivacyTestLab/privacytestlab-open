const passwordInput = document.getElementById("password-input");
const strengthBar = document.getElementById("strength-bar");
const strengthLabel = document.getElementById("strength-label");

const scoreNumber = document.getElementById("score-number");

const lowercaseBox = document.getElementById("lowercase-box");
const uppercaseBox = document.getElementById("uppercase-box");
const numberBox = document.getElementById("number-box");
const symbolBox = document.getElementById("symbol-box");

const lengthCheck = document.getElementById("length-check");
const varietyCheck = document.getElementById("variety-check");
const patternCheck = document.getElementById("pattern-check");
const entropyCheck = document.getElementById("entropy-check");

const crackTime = document.getElementById("crack-time");
const passwordReview = document.getElementById("password-review");

const showPassword = document.getElementById("show-password");

/* =========================================
   SHOW / HIDE PASSWORD
========================================= */

showPassword.addEventListener("change", () => {
  passwordInput.type = showPassword.checked ? "text" : "password";
});

/* =========================================
   PASSWORD ANALYSIS
========================================= */

passwordInput.addEventListener("input", () => {

  const password = passwordInput.value;

  resetCharacterBoxes();

  if(password.length === 0){

    strengthBar.className = "";
    strengthBar.style.width = "0%";

    strengthLabel.textContent = "Waiting for input...";

    scoreNumber.textContent = "0";

    lengthCheck.textContent = "—";
    varietyCheck.textContent = "—";
    patternCheck.textContent = "—";
    entropyCheck.textContent = "—";

    crackTime.textContent = "—";

    passwordReview.textContent =
      "Enter a password to begin analysis.";

    return;
  }

  /* =========================================
     CHARACTER TYPE DETECTION
  ========================================= */

  const hasLowercase = /[a-z]/.test(password);
  const hasUppercase = /[A-Z]/.test(password);
  const hasNumbers = /[0-9]/.test(password);
  const hasSymbols = /[^A-Za-z0-9]/.test(password);

  let characterPool = 0;
  let varietyCount = 0;

  if(hasLowercase){
    lowercaseBox.classList.add("active");
    characterPool += 26;
    varietyCount++;
  }

  if(hasUppercase){
    uppercaseBox.classList.add("active");
    characterPool += 26;
    varietyCount++;
  }

  if(hasNumbers){
    numberBox.classList.add("active");
    characterPool += 10;
    varietyCount++;
  }

  if(hasSymbols){
    symbolBox.classList.add("active");
    characterPool += 32;
    varietyCount++;
  }

  /* =========================================
     COMMON PATTERN DETECTION
  ========================================= */

  let patternDetected = false;

  const weakPatterns = [
    "123",
    "1234",
    "12345",
    "password",
    "admin",
    "qwerty",
    "abc",
    "111",
    "000",
    "iloveyou"
  ];

  /* NORMAL WEAK WORDS */
  weakPatterns.forEach(pattern => {
    if(password.toLowerCase().includes(pattern)){
      patternDetected = true;
    }
  });

  /* SAME CHARACTER REPEATED
     examples:
     rrr
     hhh
     333
     aaaa
  */
  if(/(.)\1{2,}/i.test(password)){
    patternDetected = true;
  }

  /* REPEATED GROUP PATTERN
     examples:
     1212
     uyuy
     abab
     xyzxyz
  */
  if(/^(.+)\1+$/.test(password)){
    patternDetected = true;
  }

  /* SEQUENTIAL CHARACTERS */

const lowerPassword = password.toLowerCase();

const alphabetSequence = "abcdefghijklmnopqrstuvwxyz";
const numberSequence = "0123456789";

if(
  alphabetSequence.includes(lowerPassword) ||
  numberSequence.includes(lowerPassword)
){
  patternDetected = true;
}
  /* =========================================
     ENTROPY CALCULATION
  ========================================= */

  const entropy =
    Math.round(password.length * Math.log2(characterPool || 1));

  /* =========================================
     SCORE CALCULATION
  ========================================= */

  let score = 0;

  /* LENGTH */
  if(password.length >= 8) score += 2;
  if(password.length >= 12) score += 2;
  if(password.length >= 16) score += 1;

  /* CHARACTER TYPES */
  score += varietyCount;

  /* PENALIZE COMMON PATTERNS */
  if(patternDetected){
    score -= 3;
  }else{
    score += 1;
  }

  /* VERY SHORT PASSWORD PENALTY */
  if(password.length <= 4){
    score -= 2;
  }

  /* LIMIT SCORE */
  if(score > 10) score = 10;
  if(score < 0) score = 0;

  scoreNumber.textContent = score;

  /* =========================================
     STRENGTH LEVEL
  ========================================= */

  strengthBar.className = "";

  let strength = "";
  let review = "";

  if(score <= 2){

    strength = "Very Weak";

    strengthBar.classList.add("very-weak");

    review =
      "This password is highly predictable and extremely easy to crack.";

  }

  else if(score <= 4){

    strength = "Weak";

    strengthBar.classList.add("weak");

    review =
      "This password needs more complexity and better randomness.";

  }

  else if(score <= 6){

    strength = "Medium";

    strengthBar.classList.add("medium");

    review =
      "Reasonable password, but still vulnerable to stronger attacks.";

  }

  else if(score <= 8){

    strength = "Strong";

    strengthBar.classList.add("strong");

    review =
      "Good password with solid resistance against common attacks.";

  }

  else{

    strength = "Very Strong";

    strengthBar.classList.add("very-strong");

    review =
      "Excellent password with high resistance against brute-force attacks.";

  }

  strengthLabel.textContent = strength;

  passwordReview.textContent = review;

  /* =========================================
     ANALYSIS DETAILS
  ========================================= */

  lengthCheck.textContent =
    `${password.length} characters`;

  varietyCheck.textContent =
    `${varietyCount}/4 character types used`;

  patternCheck.textContent =
    patternDetected
      ? "Common predictable pattern detected"
      : "No common weak patterns found";

  entropyCheck.textContent =
    `${entropy} bits`;

  /* =========================================
     ESTIMATED CRACK TIME
  ========================================= */

  const guessesPerSecond = 10000000000;

  const combinations =
    Math.pow(characterPool || 1, password.length);

  const seconds =
    combinations / guessesPerSecond;

  crackTime.textContent =
    formatTime(seconds);

});

/* =========================================
   RESET CHARACTER BOXES
========================================= */

function resetCharacterBoxes(){

  lowercaseBox.classList.remove("active");
  uppercaseBox.classList.remove("active");
  numberBox.classList.remove("active");
  symbolBox.classList.remove("active");

}

/* =========================================
   FORMAT TIME
========================================= */

function formatTime(seconds){

  if(seconds < 1){
    return "Instantly";
  }

  const minute = 60;
  const hour = minute * 60;
  const day = hour * 24;
  const month = day * 30;
  const year = day * 365;

  if(seconds < minute){
    return `${Math.floor(seconds)} seconds`;
  }

  if(seconds < hour){
    return `${Math.floor(seconds / minute)} minutes`;
  }

  if(seconds < day){
    return `${Math.floor(seconds / hour)} hours`;
  }

  if(seconds < month){
    return `${Math.floor(seconds / day)} days`;
  }

  if(seconds < year){
    return `${Math.floor(seconds / month)} months`;
  }

  if(seconds < year * 1000){
    return `${Math.floor(seconds / year)} years`;
  }

  if(seconds < year * 1000000){
    return `${Math.floor(seconds / (year * 1000))} thousand years`;
  }

  if(seconds < year * 1000000000){
    return `${Math.floor(seconds / (year * 1000000))} million years`;
  }

  return "Billions of years";
}