fetch("load.php")
  .then((response) => response.json())
  .then((data) => {
    for (const id in data) {
      const el = document.getElementById(id);
      if (el) {
        el.innerHTML = data[id];
      }
    }

    // Initialiser les éditeurs uniquement APRÈS le remplissage
    if (typeof initSunEditors === "function") {
      initSunEditors();
    }
  });
