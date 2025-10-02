document.addEventListener("DOMContentLoaded", function () {
    const html = document.documentElement;
    const toggle = document.getElementById("darkModeToggle");
    const textSizeSelect = document.getElementById("textSizeSelect");

    // ----- Dark Mode -----
    if (localStorage.getItem("theme") === "dark") {
        html.classList.add("dark");
        if (toggle) toggle.checked = true;
    }

    if (toggle) {
        toggle.addEventListener("change", () => {
            if (toggle.checked) {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        });
    }

    // ----- Text Size -----
    const savedSize = localStorage.getItem("textSize") || "base";
    html.classList.add(`text-size-${savedSize}`);
    if (textSizeSelect) textSizeSelect.value = savedSize;

    if (textSizeSelect) {
        textSizeSelect.addEventListener("change", () => {
            html.classList.remove("text-size-sm", "text-size-base", "text-size-lg", "text-size-xl");
            const newSize = textSizeSelect.value;
            html.classList.add(`text-size-${newSize}`);
            localStorage.setItem("textSize", newSize);
        });
    }
});
