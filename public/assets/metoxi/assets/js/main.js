

$(function () {
  "use strict";


  /* scrollar */

  new PerfectScrollbar(".notify-list")

  new PerfectScrollbar(".search-content")

  // new PerfectScrollbar(".mega-menu-widgets")



  /* toggle button */

  $(".btn-toggle").click(function () {
    $("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
      $("body").addClass("sidebar-hovered")
    }, function () {
      $("body").removeClass("sidebar-hovered")
    }))
  })


function removeToggledClass(mq) {
    if (mq.matches) {
        $("body").removeClass("toggled");
    }
}

  // Specify the media query for mobile screens
  var mediaQuery = window.matchMedia("(max-width: 768px)");

  // Call the function initially and add an event listener for changes
  removeToggledClass(mediaQuery);
  mediaQuery.addListener(removeToggledClass);


  /* menu */

  $(function () {
    $('#sidenav').metisMenu();
  });

  $(".sidebar-close").on("click", function () {
    $("body").removeClass("toggled")
  })



  /* dark mode button */

  $(".dark-mode i").click(function () {
    $(this).text(function (i, v) {
      return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
    })
  });

  var a = 1; 

  $(".dark-mode").click(function () {
    if(a == 1){
      $("[class^='h']:not(h5).blue").addClass("text-white"); 
      a = 0; 
    }else{
      $("[class^='h']:not(h5).blue").removeClass("text-white");
      a = 1;
    
    }
    $("html").attr("data-bs-theme", function (i, v) {
      return v === 'dark' ? 'light' : 'dark';
    })
    applyThemeStyles()
  })



  /* switcher */

  $("#LightTheme").on("click", function () {
    $("html").attr("data-bs-theme", "light");
    applyThemeStyles();
});

$("#DarkTheme").on("click", function () {
    $("html").attr("data-bs-theme", "dark");
    applyThemeStyles();
});

$("#SemiDarkTheme").on("click", function () {
    $("html").attr("data-bs-theme", "semi-dark");
    applyThemeStyles();
});

$("#BoderedTheme").on("click", function () {
    $("html").attr("data-bs-theme", "bodered-theme");
    applyThemeStyles();
});

function applyThemeStyles() {
    var theme = $("html").attr("data-bs-theme");

    if (theme === "dark") {
        // Overwrite styles for dark theme
        $(".blue").addClass("blue-dark");
        $(".statistics-card-content").addClass("statistics-card-content-dark");
        $(".paragraph-style2").addClass("paragraph-style2-dark");
    } else if (theme === "semi-dark") {
        // Reset styles for semi-dark theme
       $(".blue").removeClass("blue-dark");
        $(".statistics-card-content").removeClass("statistics-card-content-dark");
        $(".paragraph-style2").removeClass("paragraph-style2-dark");
    } else {
        // Apply styles for light theme
       $(".blue").removeClass("blue-dark");
        $(".statistics-card-content").removeClass("statistics-card-content-dark");
        $(".paragraph-style2").removeClass("paragraph-style2-dark");
    
    }
}




  /* search control */

  $(".search-control").click(function () {
    $(".search-popup").addClass("d-block");
    $(".search-close").addClass("d-block");
  });


  $(".search-close").click(function () {
    $(".search-popup").removeClass("d-block");
    $(".search-close").removeClass("d-block");
  });


  $(".mobile-search-btn").click(function () {
    $(".search-popup").addClass("d-block");
  });


  $(".mobile-search-close").click(function () {
    $(".search-popup").removeClass("d-block");
  });




  /* menu active */

  $(function () {
    for (var e = window.location, o = $(".metismenu li a").filter(function () {
      return this.href == e
    }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
  });



});










