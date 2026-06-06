(function() {
  document.addEventListener('DOMContentLoaded', function() {

    // 1. Viewport Scroll Reveal (Prefixed)
    const capheReveals = document.querySelectorAll('.caphe-reveal');

    function checkCapheReveal() {
      const triggerBottom = window.innerHeight * 0.95;

      capheReveals.forEach(reveal => {
        const revealTop = reveal.getBoundingClientRect().top;

        if (revealTop < triggerBottom) {
          reveal.classList.add('caphe-active');
        }
      });
    }

    window.addEventListener('scroll', checkCapheReveal);
    checkCapheReveal(); // check on load

    // 2. Scroll Zoom Interaction (for full-width processing section left-side image)
    const capheZoomImg = document.getElementById('caphe-processingZoomImg');

    function handleCapheImageScrollZoom() {
      if (!capheZoomImg) return;

      const rect = capheZoomImg.getBoundingClientRect();
      const viewHeight = window.innerHeight;

      // Check if the image container is in the viewport
      if (rect.top < viewHeight && rect.bottom > 0) {
        // Calculate how far the image has traveled through the viewport (0 to 1)
        const totalDistance = viewHeight + rect.height;
        const currentDistance = viewHeight - rect.top;
        const scrollPercent = Math.min(Math.max(currentDistance / totalDistance, 0), 1);

        // Map scrollPercent (0 to 1) to scale (1.0 to 1.16)
        const minScale = 1.0;
        const maxScale = 1.45;
        const scale = minScale + (scrollPercent * (maxScale - minScale));

        // Apply scale smoothly
        capheZoomImg.style.transform = `scale(${scale})`;
      }
    }

    window.addEventListener('scroll', handleCapheImageScrollZoom);
    handleCapheImageScrollZoom(); // check on load

  });
})();
