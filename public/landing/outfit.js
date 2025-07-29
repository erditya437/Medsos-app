document.addEventListener("DOMContentLoaded", function () {
  const track = document.getElementById('galleryTrack');
  const btnLeft = document.querySelector('.scroll-left');
  const btnRight = document.querySelector('.scroll-right');

  const item = track.querySelector('.gallery-item');
  const itemWidth = item.offsetWidth + 40;

  // Animasi scroll halus
  function smoothScrollBy(element, distance, duration = 400) {
    const start = element.scrollLeft;
    const startTime = performance.now();

    function animateScroll(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const ease = 0.5 - Math.cos(progress * Math.PI) / 2;

      element.scrollLeft = start + distance * ease;

      if (progress < 1) {
        requestAnimationFrame(animateScroll);
      }
    }

    requestAnimationFrame(animateScroll);
  }

  btnLeft.addEventListener('click', () => {
    smoothScrollBy(track, -itemWidth);
  });

  btnRight.addEventListener('click', () => {
    smoothScrollBy(track, itemWidth);
  });

  // Drag-scroll
  let isDown = false;
  let startX;
  let scrollLeft;

  track.addEventListener('mousedown', (e) => {
    isDown = true;
    track.classList.add('dragging');
    startX = e.pageX - track.offsetLeft;
    scrollLeft = track.scrollLeft;
  });

  track.addEventListener('mouseleave', () => {
    isDown = false;
    track.classList.remove('dragging');
  });

  track.addEventListener('mouseup', () => {
    isDown = false;
    track.classList.remove('dragging');
  });

  track.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - track.offsetLeft;
    const walk = (x - startX) * 1.5;
    track.scrollLeft = scrollLeft - walk;
  });

  // Infinite scroll clone
  let cloning = false;

  function cloneGalleryItems() {
    const items = Array.from(track.children);
    items.forEach(item => {
      const clone = item.cloneNode(true);
      track.appendChild(clone);
    });
  }

  track.addEventListener('scroll', () => {
    const scrollRight = track.scrollLeft + track.clientWidth;
    const maxScroll = track.scrollWidth;

    if (scrollRight >= maxScroll - 100 && !cloning) {
      cloning = true;
      cloneGalleryItems();
      setTimeout(() => cloning = false, 300);
    }
  });
});
