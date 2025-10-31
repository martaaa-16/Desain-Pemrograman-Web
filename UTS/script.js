document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll("nav a").forEach(function(link) {
    link.onclick = function(e) {
      const target = link.getAttribute("href");
      if (target.startsWith("#")) {
        e.preventDefault();
        document.querySelector(target).scrollIntoView({ 
          behavior: "smooth" });
      }
    };
  });
});  