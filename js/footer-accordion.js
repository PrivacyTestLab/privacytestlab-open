document.addEventListener("DOMContentLoaded", () => {

    if(typeof lucide !== "undefined"){
        lucide.createIcons();
    }

    const accordions =
    document.querySelectorAll(".footer-accordion");

    function initFooterAccordion(){

        if(window.innerWidth <= 768){

            accordions.forEach((accordion) => {

                const button =
                accordion.querySelector(".footer-accordion-btn");

                const content =
                accordion.querySelector(".footer-accordion-content");

                if(!button || !content){
                    return;
                }

                button.onclick = () => {

                    const isActive =
                    accordion.classList.contains("active");

                    accordions.forEach((item) => {

                        item.classList.remove("active");

                        const itemContent =
                        item.querySelector(".footer-accordion-content");

                        if(itemContent){
                            itemContent.style.maxHeight = null;
                        }

                    });

                    if(!isActive){

                        accordion.classList.add("active");

                        content.style.maxHeight =
                        content.scrollHeight + "px";

                    }

                };

            });

        } else {

            accordions.forEach((accordion) => {

                accordion.classList.remove("active");

                const content =
                accordion.querySelector(".footer-accordion-content");

                if(content){

                    content.style.maxHeight = "none";

                }

            });

        }

    }

    initFooterAccordion();

    window.addEventListener("resize", initFooterAccordion);

});