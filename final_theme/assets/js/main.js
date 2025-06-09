document.addEventListener("DOMContentLoaded", function () {
    initMenuToggle();
    initStickyHeader();
    initScrollToTop();
    initSearchOverlay();
});

function initMenuToggle() {
    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".nav-menu");

    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");
            this.setAttribute(
                "aria-expanded",
                navMenu.classList.contains("active")
            );
        });
    }
}

function initStickyHeader() {
    const header = document.getElementById("site-header");
    if (!header) return;

    window.addEventListener("scroll", function () {
        if (window.scrollY > 150) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });
}

function initScrollToTop() {
    const scrollBtn = document.createElement("button");
    scrollBtn.id = "scrollToTop";
    scrollBtn.textContent = "↑";
    document.body.appendChild(scrollBtn);

    scrollBtn.style.display = "none";

    window.addEventListener("scroll", function () {
        scrollBtn.style.display = window.scrollY > 300 ? "block" : "none";
    });

    scrollBtn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}

function initSearchOverlay() {
    const searchForm = document.querySelector("#site-navigation .search-form");
    if (!searchForm) return;

    searchForm.addEventListener("submit", function (e) {
        const query = searchForm.querySelector("input[name='s']").value;
        if (!query.trim()) {
            e.preventDefault();
        }
    });
}
