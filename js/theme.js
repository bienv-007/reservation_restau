(function () {
  var storageKey = "theme-preference";
  var root = document.documentElement;
  var media = window.matchMedia("(prefers-color-scheme: dark)");

  function getPreference() {
    return localStorage.getItem(storageKey) || "system";
  }

  function resolveTheme(preference) {
    if (preference === "dark" || preference === "light") {
      return preference;
    }

    return media.matches ? "dark" : "light";
  }

  function applyTheme(preference) {
    root.dataset.theme = resolveTheme(preference);
    root.dataset.themePreference = preference;

    document.querySelectorAll("[data-theme-choice]").forEach(function (button) {
      var active = button.dataset.themeChoice === preference;
      button.classList.toggle("is-active", active);
      button.setAttribute("aria-pressed", active ? "true" : "false");
    });
  }

  function setPreference(preference) {
    localStorage.setItem(storageKey, preference);
    applyTheme(preference);
  }

  applyTheme(getPreference());

  media.addEventListener("change", function () {
    if (getPreference() === "system") {
      applyTheme("system");
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    applyTheme(getPreference());

    document.querySelectorAll("[data-theme-choice]").forEach(function (button) {
      button.addEventListener("click", function () {
        setPreference(button.dataset.themeChoice);
      });
    });
  });
})();
