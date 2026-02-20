// Musique pour le HOME

const buttons = document.querySelectorAll(".music_btn");
let currentAudio = null;

buttons.forEach((btn) => {
  btn.addEventListener("click", () => {
    const audioId = btn.dataset.audio;
    const audio = document.getElementById(audioId);

    // 1) Si on clique sur la même musique et qu'elle joue cela fera arreter la musique
    if (currentAudio === audio && !audio.paused) {
      audio.pause();
      audio.currentTime = 0;
      currentAudio = null;
      return;
    }

    // 2) Si une autre musique est en cours, stop l’ancienne
    if (currentAudio && currentAudio !== audio) {
      currentAudio.pause();
      currentAudio.currentTime = 0;
    }

    // 3) Lancer la nouvelle musique
    audio.play();
    currentAudio = audio;
  });
});

// Cette fonction ne foctionne plus, à voir pourquoi et fou la merde avec mon toggle de la page A_livre_mesbg_v6

// document.getElementById("volumeControl").addEventListener("input", function () {
//   if (currentAudio) {
//     currentAudio.volume = this.value;
//   }
// });

// -----------------------------------------------------------------------------------------------------------------------------------------------

// Bouton Afficher/masquer pour A_livre_mesbg_v6

document.querySelectorAll(".toggle-group").forEach((group) => {
  const btn = group.querySelector(".toggleBtn");
  const docs = group.querySelector(".documents");

  btn.addEventListener("click", () => {
    docs.classList.toggle("hidden");

    btn.textContent = docs.classList.contains("hidden")
      ? "Afficher les documents"
      : "Masquer les documents";
  });
});
