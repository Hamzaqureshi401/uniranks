

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


  $(".dark-mode").click(function () {
    $("html").attr("data-bs-theme", function (i, v) {
      return v === 'dark' ? 'light' : 'dark';
    })
  })



  /* switcher */

  $("#LightTheme").on("click", function () {
    $("html").attr("data-bs-theme", "light")
    $("[class^='h']:not(h5).blue").removeClass("text-white")
  }),

    $("#DarkTheme").on("click", function () {
      $("html").attr("data-bs-theme", "dark")
      $("[class^='h']:not(h5).blue").addClass("text-white")
    }),

    $("#SemiDarkTheme").on("click", function () {
      $("html").attr("data-bs-theme", "semi-dark")
      $("[class^='h']:not(h5).blue").removeClass("text-white")
    }),

    $("#BoderedTheme").on("click", function () {
      $("html").attr("data-bs-theme", "bodered-theme")
      $("[class^='h']:not(h5).blue").removeClass("text-white")
    })



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










