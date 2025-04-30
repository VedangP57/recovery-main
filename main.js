window.addEventListener("scroll", function () {
  const header = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    if (!header.classList.contains("sticky")) {
      header.classList.add("sticky");
    }
  } else {
    if (header.classList.contains("sticky")) {
      header.classList.remove("sticky");
    }
  }
});
const btn = document.getElementById("menu-btn");
const nav = document.getElementById("menu");

btn.addEventListener("click", () => {
  btn.classList.toggle("open");
  nav.classList.toggle("flex");
  nav.classList.toggle("hidden");
});
const img = document.getElementById("scalingImage");

window.addEventListener("scroll", () => {
  const maxScroll = 100; // adjust as needed
  const scrollY = window.scrollY;
  const scale = Math.max(0.6, 1 - scrollY / maxScroll);
  img.style.transform = `scale(${scale})`;
});
