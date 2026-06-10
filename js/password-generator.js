/* =========================================
   PASSWORD GENERATOR
========================================= */

const passwordOutput = document.getElementById("generated-password");
const multiplePasswordOutput = document.getElementById("multiple-password-output");

const generateBtn = document.getElementById("generate-password");
const copyBtn = document.getElementById("copy-password");
const copyAllBtn = document.getElementById("copy-all-passwords");

const advancedToggle = document.getElementById("advanced-toggle");
const advancedPanel = document.getElementById("advanced-panel");

const strengthIndicator = document.getElementById("strength-indicator");
const strengthText = document.getElementById("strength-text");





/* =========================================
   TOGGLE ADVANCED OPTIONS
========================================= */

advancedToggle.addEventListener("click", () => {

    advancedPanel.classList.toggle("active");

    if (advancedPanel.classList.contains("active")) {

        advancedToggle.textContent = "Hide Advanced Options";

    } else {

        advancedToggle.textContent = "Advanced Options";

    }

});





/* =========================================
   GENERATE PASSWORD
========================================= */

generateBtn.addEventListener("click", generatePasswords);

window.addEventListener("load", generatePasswords);





/* =========================================
   MAIN GENERATOR FUNCTION
========================================= */

function generatePasswords() {

    const length = parseInt(
        document.getElementById("password-length").value
    );

    const includeLowercase = document.getElementById("include-lowercase").checked;
    const includeUppercase = document.getElementById("include-uppercase").checked;
    const includeNumbers = document.getElementById("include-numbers").checked;
    const includeSymbols = document.getElementById("include-symbols").checked;

    const excludeSimilar = document.getElementById("exclude-similar").checked;
    const excludeAmbiguous = document.getElementById("exclude-ambiguous").checked;
    const noDuplicate = document.getElementById("no-duplicate").checked;

    const customInclude = document.getElementById("custom-include").value;
    const customExclude = document.getElementById("custom-exclude").value;

    const passwordCount = parseInt(
        document.getElementById("password-count").value
    );

    const passwordPrefix = document.getElementById("password-prefix").value;
    const passwordSuffix = document.getElementById("password-suffix").value;





    /* VALIDATION */

    if (isNaN(length) || length < 4 || length > 488) {

        alert("Password length must be between 4 and 488.");

        return;

    }

    if (
        !includeLowercase &&
        !includeUppercase &&
        !includeNumbers &&
        !includeSymbols &&
        customInclude.length === 0
    ) {

        alert("Select at least one character type.");

        return;

    }

    if (isNaN(passwordCount) || passwordCount < 1 || passwordCount > 50) {

        alert("You can generate between 1 and 50 passwords.");

        return;

    }





    /* CHARACTER SETS */

    let lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
    let uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let numberChars = "0123456789";
    let symbolChars = "!@#$%^&*()_+-={}[]|:;<>,.?/~";





    /* EXCLUDE SIMILAR */

    if (excludeSimilar) {

        lowercaseChars = lowercaseChars.replace(/[oil]/g, "");
        uppercaseChars = uppercaseChars.replace(/[OI]/g, "");
        numberChars = numberChars.replace(/[01]/g, "");

    }





    /* EXCLUDE AMBIGUOUS */

    if (excludeAmbiguous) {

        symbolChars = symbolChars.replace(/[{}[\]()/\\'"`~,;:.<>]/g, "");

    }





    /* BUILD CHARACTER POOL */

    let characterPool = "";

    if (includeLowercase) characterPool += lowercaseChars;
    if (includeUppercase) characterPool += uppercaseChars;
    if (includeNumbers) characterPool += numberChars;
    if (includeSymbols) characterPool += symbolChars;





    /* CUSTOM INCLUDE */

    if (customInclude.length > 0) {

        characterPool += customInclude;

    }





    /* REMOVE EXCLUDED CHARS */

    if (customExclude.length > 0) {

        const escaped = customExclude.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&");

        const regex = new RegExp("[" + escaped + "]", "g");

        characterPool = characterPool.replace(regex, "");

    }





    /* REMOVE DUPLICATES FROM POOL */

    characterPool = [...new Set(characterPool)].join("");





    /* CHECK POOL */

    if (characterPool.length === 0) {

        alert("No valid characters available.");

        return;

    }





    /* GENERATE PASSWORDS */

    let generatedPasswords = [];

    for (let i = 0; i < passwordCount; i++) {

        let password = "";

        let availableChars = characterPool;





        /* ADD PREFIX */

        if (passwordPrefix.length > 0) {

            password += passwordPrefix;

        }





        /* MAIN RANDOM LOOP */

        while (
            password.length < (length - passwordSuffix.length)
        ) {

            if (availableChars.length === 0) {
                break;
            }

            const randomIndex = secureRandom(availableChars.length);

            const randomChar = availableChars[randomIndex];

            password += randomChar;





            /* NO DUPLICATE OPTION */

            if (noDuplicate) {

                availableChars = availableChars.replace(randomChar, "");

            }

        }





        /* ADD SUFFIX */

        password += passwordSuffix;





        /* FINAL CUT */

        password = password.substring(0, length);

        generatedPasswords.push(password);

    }





    /* DISPLAY */

    passwordOutput.value = generatedPasswords[0];

    multiplePasswordOutput.value = generatedPasswords.join("\n");





    /* STRENGTH */

    checkPasswordStrength(generatedPasswords[0]);

}





/* =========================================
   SECURE RANDOM
========================================= */

function secureRandom(max) {

    const array = new Uint32Array(1);

    window.crypto.getRandomValues(array);

    return array[0] % max;

}





/* =========================================
   COPY SINGLE PASSWORD
========================================= */

copyBtn.addEventListener("click", () => {

    if (!passwordOutput.value) return;

    navigator.clipboard.writeText(passwordOutput.value);

    const originalText = copyBtn.textContent;

    copyBtn.textContent = "Copied!";

    setTimeout(() => {

        copyBtn.textContent = originalText;

    }, 1800);

});





/* =========================================
   COPY ALL PASSWORDS
========================================= */

copyAllBtn.addEventListener("click", () => {

    if (!multiplePasswordOutput.value) return;

    navigator.clipboard.writeText(
        multiplePasswordOutput.value
    );

    const originalText = copyAllBtn.textContent;

    copyAllBtn.textContent = "Copied!";

    setTimeout(() => {

        copyAllBtn.textContent = originalText;

    }, 1800);

});





/* =========================================
   PASSWORD STRENGTH
========================================= */

function checkPasswordStrength(password) {

    let score = 0;





    /* LENGTH */

    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (password.length >= 18) score++;





    /* CHARACTER TYPES */

    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^A-Za-z0-9]/.test(password)) score++;





    /* RESET */

    strengthIndicator.className = "";





    /* WEAK */

    if (score <= 3) {

        strengthIndicator.classList.add("weak");

        strengthText.textContent = "Weak";

    }





    /* MEDIUM */

    else if (score <= 5) {

        strengthIndicator.classList.add("medium");

        strengthText.textContent = "Medium";

    }





    /* STRONG */

    else {

        strengthIndicator.classList.add("strong");

        strengthText.textContent = "Strong";

    }

}





/* =========================================
   AUTO GENERATE ON INPUT CHANGE
========================================= */

const autoGenerateInputs = document.querySelectorAll(
    "input"
);

autoGenerateInputs.forEach(input => {

    input.addEventListener("input", () => {

        generatePasswords();

    });

});





/* =========================================
   ENTER KEY SUPPORT
========================================= */

document.addEventListener("keydown", (event) => {

    if (event.key === "Enter") {

        generatePasswords();

    }

});