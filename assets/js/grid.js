$(document).ready(function () {

    var counter_header = 0;
    var counter_scereen = 0;


    $('.hide-menu').click(function (e) {
        $("aside").css("display", "none");
        $(".main-body").removeClass("mr-aside");
        removeToggleClass();
        $(".hide-menu").addClass("d-none");
        $(".show-menu").addClass("d-block");
    });

    $(".show-menu").click(function (e) {
        $("aside").css("display", "block");
        $(".main-body").addClass("mr-aside");
        removeToggleClass();
        $(".show-menu").addClass("d-none");
        $(".hide-menu").addClass("d-block");
    });

    $(".show-header").click(function (e) {
        if (counter_header & 1) {
            $(".body-header").removeClass("d-block");
            $(".body-header").addClass("d-none");
        }
        else {
            $(".body-header").removeClass("d-none");
            $(".body-header").addClass("d-block");
        }
        counter_header++;
    });

    $(".show-search").click(function (e) {
        $(".search-area").removeClass("d-none");
        $(".show-search").css("display", "none");
    });

    $(".close-search").click(function (e) {
        $(".search-area").addClass("d-none");
        $(".show-search").css("display", "inline");
    });

    $(".notification-icon").click(function (e) {
        $(".notification-menu").toggleClass("d-none");
        $(".user-profile-menu").addClass("d-none");
        $(".comment-menu").addClass("d-none");
    });

    $(".comment-icon").click(function (e) {
        $(".comment-menu").toggleClass("d-none");
        $(".user-profile-menu").addClass("d-none");
        $(".notification-menu").addClass("d-none");
    });

    $(".user-profile").click(function (e) {
        $(".user-profile-menu").toggleClass("d-none");
        $(".comment-menu").addClass("d-none");
        $(".notification-menu").addClass("d-none");
    });

    $(".sidebar-group-link").click(function (e) {
        $(".sidebar-group-link").children(".sidebar-dropdown-item").addClass("d-none");
        $(this).children(".sidebar-dropdown-item").removeClass("d-none");
    });

    $(".full-screen").click(function (e) {
        if (counter_scereen & 1) {
            $(".full").addClass("d-none");
            $(".none-full").removeClass("d-none");
            document.exitFullscreen();
        }
        else {
            $(".full").removeClass("d-none");
            $(".none-full").addClass("d-none");
            document.documentElement.requestFullscreen();
        }
        counter_scereen++;
    });

});

function removeToggleClass() {
    $(".show-menu").removeClass("d-md-none");
    $(".hide-menu").removeClass("d-md-inline");
    $(".show-menu").removeClass("d-inline");
    $(".hide-menu").removeClass("d-none");
    $(".show-menu").removeClass("d-none");
    $(".hide-menu").removeClass("d-block");
    $(".show-menu").removeClass("d-block");
}