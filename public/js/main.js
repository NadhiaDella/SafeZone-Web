const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

// header container
ScrollReveal().reveal(".header__container h1", scrollRevealOption);

ScrollReveal().reveal(".header__container h4", {
  ...scrollRevealOption,
  delay: 500,
});

ScrollReveal().reveal(".header__container .btn", {
  ...scrollRevealOption,
  delay: 1000,
});

// pengaduan container
ScrollReveal().reveal(".pengaduan__container .section__header", scrollRevealOption);
ScrollReveal().reveal(".pengaduan__container .section__subheader", {
  ...scrollRevealOption,
  delay: 500,
});

ScrollReveal().reveal(".pengaduan__container .pengaduan__flex", {
  ...scrollRevealOption,
  delay: 1000,
});

ScrollReveal().reveal(".pengaduan__container .btn", {
  ...scrollRevealOption,
  delay: 1500,
});

// konseling container
ScrollReveal().reveal(".konseling__card", {
  ...scrollRevealOption,
  interval: 500,
});

ScrollReveal().reveal(".konseling__card__content", {
  ...scrollRevealOption,
  interval: 500,
  delay: 200,
});

// pendampingan hukum container
ScrollReveal().reveal(".hukum__card", {
  duration: 1000,
  interval: 400,
});

// informasi container
ScrollReveal().reveal(".informasi__card", {
  ...scrollRevealOption,
  interval: 400,
});


function NavMobile() {
  const konten = document.getElementById('navMobile');
  if (konten.style.display === 'none' || konten.style.display === '') {
      konten.style.display = 'inline'; // Tampilkan konten
  } else {
      konten.style.display = 'none'; // Sembunyikan konten
  }
}

document.getElementById('pilih_konselor').addEventListener('change', function() {
  // Get selected option
  const selectedOption = this.options[this.selectedIndex];

  // Set input values based on selected option's data attributes
  document.getElementById('title').value = selectedOption.getAttribute('data-title') || '';
  document.getElementById('voice_price').value = selectedOption.getAttribute('data-voice') || '';
  document.getElementById('video_price').value = selectedOption.getAttribute('data-video') || '';
  document.getElementById('offline_price').value = selectedOption.getAttribute('data-offline') || '';
});