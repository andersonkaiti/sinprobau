let currentTab = 0;

const previousTabButton = document.getElementById("prevBtn");
const nextTabButton = document.getElementById("nextBtn");
const steps = document.querySelectorAll(".step");

previousTabButton.addEventListener("click", () => {
    nextPrev(-1);
});

nextTabButton.addEventListener("click", () => {
    nextPrev(1);
});

showTab(currentTab);

function showTab(currentTab) {
    for (let i = 0; i < steps.length; i++) {
        steps[i].style.display = "none";
    }

    steps[currentTab].style.display = "block";

    if (currentTab == 0) {
        previousTabButton.style.display = "none";
    } else {
        previousTabButton.style.display = "block";
    }

    if (currentTab == steps.length - 1) {
        nextTabButton.type = "submit";
        nextTabButton.innerHTML = "Enviar";
    } else {
        nextTabButton.type = "button";
        nextTabButton.innerHTML = "Próximo";
    }

    fixStepIndicator(currentTab);
}

function nextPrev(step) {
    const newTab = currentTab + step;

    if (newTab < 0 || newTab >= steps.length) {
        document.getElementById("send-email-form").submit();
        return;
    }

    currentTab = newTab;
    showTab(currentTab);
}

function fixStepIndicator(currentTab) {
    const stepIndicators = document.querySelectorAll(".stepIndicator");

    for (let i = 0; i < stepIndicators.length; i++) {
        stepIndicators[i].classList.remove("text-[#138942]");

        const verifiedImage = stepIndicators[i].querySelector("img");
        if (verifiedImage) {
            verifiedImage.classList.add("hidden");
            verifiedImage.classList.remove("flex");
        }
    }

    stepIndicators[currentTab].classList.add("text-[#138942]");

    const verifiedImage = stepIndicators[currentTab].querySelector("img");

    verifiedImage.classList.remove("hidden");
    verifiedImage.classList.add("flex");

    stepIndicators[currentTab].insertBefore(
        verifiedImage,
        stepIndicators[currentTab].firstChild
    );
}