const counters = document.querySelectorAll('.counter');

function runCounters() {
  counters.forEach(counter => {
    // Reset angka ke 0 sebelum animasi
    counter.innerText = '0';

    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      const count = +counter.innerText;

      const increment = target / 50;

      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target;
      }
    };

    updateCount();
  });
}

function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top < window.innerHeight &&
    rect.bottom > 0
  );
}

let lastVisible = false;

window.addEventListener('scroll', () => {
  const aboutSection = document.querySelector('.about');
  if (!aboutSection) return;

  const currentlyVisible = isInViewport(aboutSection);

  // Cek perubahan dari tidak terlihat → terlihat
  if (currentlyVisible && !lastVisible) {
    runCounters();
  }

  lastVisible = currentlyVisible;
});
