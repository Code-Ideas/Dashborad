document.addEventListener('DOMContentLoaded', function() {
    'use strict';


    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function($el) {
            $el.addEventListener('click', function() {

                // Get the target from the "data-target" attribute
                var target = $el.dataset.target;
                var $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }
});


$('document').ready(function() {
    $('.pageloader').removeClass('is-active');
});
$(document).ready(function() {

    $('#sidebar_toggle').click(function(e) {
        e.preventDefault();
        console.log('hii');

        $('#aside-container , #main-container').toggleClass("closed");
    });


    $(".modal-open").click(function() {
        var modalClass = $(this).attr("traget-modal");
        $(modalClass).addClass('is-active');

        $(modalClass + ' .delete-form').attr("action", $(this).attr("data-url"));
        $(modalClass + ' .delete-form .delete-text strong').html($(this).attr("data_name"));
        $(modalClass + ' .status-name').html($(this).attr("status-name"));
        $(modalClass + ' .user-phone').html($(this).attr("user-phone"));
        $(modalClass + ' .user-points').val($(this).attr("user-points"));
        $(modalClass + ' .old-data').val($(this).attr("old-data"));
        $(modalClass + " .close-modal").click(function(e) {
            e.preventDefault();
            $(modalClass).removeClass('is-active');
            $(modalClass + ' .delete-form .delete-text strong').html('');

        });
    });
});