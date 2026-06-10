// ======================================================
// MOBILE SIDEBAR ELEMENTS
// ======================================================

const mobileMenuBtn =
document.getElementById("mobileMenuBtn");

const mobileSidebar =
document.getElementById("mobileSidebar");

const mobileOverlay =
document.getElementById("mobileOverlay");

const mobileCloseBtn =
document.getElementById("mobileCloseBtn");


// ======================================================
// OPEN MOBILE SIDEBAR
// ======================================================

if(mobileMenuBtn){

    mobileMenuBtn.addEventListener("click", () => {

        mobileSidebar.classList.add("active");

        mobileOverlay.classList.add("active");

        document.body.style.overflow = "hidden";

    });

}


// ======================================================
// CLOSE MOBILE SIDEBAR
// ======================================================

function closeMobileMenu(){

    mobileSidebar.classList.remove("active");

    mobileOverlay.classList.remove("active");

    document.body.style.overflow = "";

}


// ======================================================
// CLOSE BUTTON
// ======================================================

if(mobileCloseBtn){

    mobileCloseBtn.addEventListener(
        "click",
        closeMobileMenu
    );

}


// ======================================================
// CLOSE ON OVERLAY CLICK
// ======================================================

if(mobileOverlay){

    mobileOverlay.addEventListener(
        "click",
        closeMobileMenu
    );

}


// ======================================================
// CLOSE MENU WHEN PRESS ESC
// ======================================================

document.addEventListener("keydown", (e) => {

    if(e.key === "Escape"){

        closeMobileMenu();

    }

});


// ======================================================
// MOBILE ACCORDION
// ======================================================

const accordions =
document.querySelectorAll(".mobile-accordion");

accordions.forEach((accordion) => {

    const button =
    accordion.querySelector(".mobile-accordion-btn");

    const content =
    accordion.querySelector(".mobile-accordion-content");

    // SAFETY CHECK

    if(!button || !content){

        return;
    }

    button.addEventListener("click", () => {

        const isActive =
        accordion.classList.contains("active");

        // CLOSE ALL

        accordions.forEach((item) => {

            item.classList.remove("active");

            const itemContent =
            item.querySelector(".mobile-accordion-content");

            if(itemContent){

                itemContent.style.maxHeight = null;

            }

        });

        // OPEN CURRENT

        if(!isActive){

            accordion.classList.add("active");

            content.style.maxHeight =
            content.scrollHeight + "px";

        }

    });

});
// ======================================================
// AUTO CLOSE SIDEBAR WHEN WINDOW RESIZES
// ======================================================

window.addEventListener("resize", () => {

    if(window.innerWidth > 900){

        closeMobileMenu();

    }

});


// ======================================================
// TOUCH OPTIMIZATION
// ======================================================

document.addEventListener(
    "touchstart",
    () => {},
    true
);


// ======================================================
// INIT LUCIDE ICONS
// ======================================================

if(typeof lucide !== "undefined"){

    lucide.createIcons();

}