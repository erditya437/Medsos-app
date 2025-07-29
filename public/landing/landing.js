const navbar = document.getElementById("navbar");
const brandHero = document.getElementById("brand-hero");

window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  // Add/remove scroll class
  if (scrollY > 100) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }

  // Brand transform: smooth scale and move
  let scale = Math.max(1 - scrollY / 500, 0.5);
  let translateY = Math.max(-scrollY / 1.5, -150);

  brandHero.style.transform = `translateY(${translateY}px) scale(${scale})`;
  brandHero.style.opacity = scrollY > 250 ? 0 : 1;
});



