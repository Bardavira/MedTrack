document.addEventListener("DOMContentLoaded", function () { 
    const html = document.documentElement;
     const toggle = document.getElementById("darkModeToggle");
      const textSizeSelect = document.getElementById("textSizeSelect");
       
      // ----- Defensive startup sync ----- 
      // Ensure a single text-size-* class (remove leftovers) 
      html.classList.remove("text-size-sm", "text-size-base", "text-size-lg", "text-size-xl");
    const savedSize = localStorage.getItem("textSize") || "base";
    html.classList.add("text-size-" + savedSize); 
    if (textSizeSelect) textSizeSelect.value = savedSize; 
    // Sync dark toggle state (from localStorage or system preference if not set) 
    const storedTheme = localStorage.getItem("theme"); 
    if (toggle) { 
        if (storedTheme === "dark") { 
            toggle.checked = true;
         } else if (storedTheme === "light") { 
            toggle.checked = false; 
        } else {
             // no stored preference -> follow system 
             toggle.checked = !!(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches); } }
              // ----- Dark Mode ----- 
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
            if (textSizeSelect) 
            { textSizeSelect.addEventListener("change", () => { 
                html.classList.remove("text-size-sm", "text-size-base", "text-size-lg", "text-size-xl"); 
                const newSize = textSizeSelect.value; 
                html.classList.add("text-size-" + newSize); 
localStorage.setItem("textSize", newSize); 
}); 
} 
});