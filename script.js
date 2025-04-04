
const backToTopButton = document.getElementById("backToTop");

window.onscroll = function () {
if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 300) {
    backToTopButton.style.display = "block"; // Show button when scrolled 300px
} else {
    backToTopButton.style.display = "none"; // Hide button when near top
}
};

backToTopButton.onclick = function () {
window.scrollTo({ top: 0, behavior: "smooth" }); // Smooth scroll to top
};

