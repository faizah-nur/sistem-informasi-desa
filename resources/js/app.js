import "./bootstrap";

// Initialize feather icons when DOM is ready
document.addEventListener("DOMContentLoaded", () => {
    if (typeof feather !== "undefined") {
        feather.replace();
    }
});

// SCRIPT PARALLAX
// navbar toggle
const menuBtn = document.getElementById("menuBtn");
const mobileMenu = document.getElementById("mobileMenu");

if (menuBtn && mobileMenu) {
    menuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
}

// Parallax
const bg = document.getElementById("bg");

window.addEventListener("scroll", () => {
    let s = window.scrollY;
    if (bg) {
        bg.style.transform = `translateY(${s * 0.15}px)`;
    }
});

// about start
// PARALLAX UNTUK GAMBAR
const sekilasImg = document.getElementById("sekilasImg");

window.addEventListener("scroll", () => {
    let offset = window.scrollY;
    if (sekilasImg) {
        sekilasImg.style.transform = `translateY(${offset * 0.08}px)`;
    }
});

// SCROLL REVEAL UNTUK TEKS
const sekilasText = document.getElementById("sekilasText");

if (sekilasText) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    sekilasText.classList.remove("opacity-0", "translate-y-6");
                    sekilasText.classList.add("opacity-100", "translate-y-0");
                }
            });
        },
        { threshold: 0.3 }
    );

    observer.observe(sekilasText);
}

// pengumunan penting start
const reveals = document.querySelectorAll(".reveal");

const revealOnScroll = () => {
    for (let el of reveals) {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            el.classList.add("active");
        }
    }
};

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);
// pengumunan penting end
