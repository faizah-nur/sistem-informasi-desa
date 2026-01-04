// ========================
// POPUP KABAR
// ========================
window.addEventListener("load", function () {
    const popup = document.getElementById("popup-kabar");
    const closeBtn = document.getElementById("closePopup");

    if (!popup || !closeBtn) return;

    closeBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        popup.classList.add("hidden");
        localStorage.setItem("popupSeen", "true");
    });

    popup.addEventListener("click", function () {
        popup.classList.add("hidden");
        localStorage.setItem("popupSeen", "true");
    });

    // if (localStorage.getItem("popupSeen")) {
    //     popup.classList.add("hidden");
    // }
});
