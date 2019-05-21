$(function() {

    /**
     * Initialize the tooltip-function from Bootstrap
     */
    $('[data-tooltip=true]').tooltip();


    /**
     * Sidebar Functions
     */

    // Hide submenus
    $('#body-row .collapse').collapse('hide');

    // Collapse/Expand icon
    $('#collapse-icon').addClass('fa-angle-double-left');

    // Collapse click
    $('[data-toggle=sidebar-collapse]').click(function() {
        SidebarCollapse();
    });

    // Expand sidebar if menu item has submenu
    $('[data-hassubmenu=true]').click(function() {
        if ($('#sidebar-container').hasClass('sidebar-collapsed')) {
            var submenu = $(this).attr('href');
            if ($(submenu).hasClass('show')) $(submenu).removeClass('show');
            SidebarCollapse();
        }
    });

    // Start with collapsed sidebar
    SidebarCollapse();

    function SidebarCollapse() {
        // $('.menu-collapsed').toggleClass('d-none');
        // $('.sidebar-submenu').toggleClass('d-none');
        // $('.submenu-icon').toggleClass('d-none');
        // $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

        // Treating d-flex/d-none on separators with title
        var SeparatorTitle = $('.sidebar-separator-title');
        if (SeparatorTitle.hasClass('d-flex')) SeparatorTitle.removeClass('d-flex');
        else SeparatorTitle.addClass('d-flex');

        // Collapse/Expand icon
        $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
    }
});

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


jQuery(document).ready(function($){
    var text = $('#tt').text()
    if (text == 'none'){

        window.onload = function (){
            $(".bts-popup").delay(1000).addClass('is-visible');
        }
    }


    //open popup
    var text = $('#tt').text()

    $('.bts-popup-trigger').on('click', function(event){
        event.preventDefault();
        $('.bts-popup').addClass('is-visible');
    });


    //close popup
    $('.bts-popup').on('click', function(event){
        if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
            // event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event){
        if(event.which=='27'){
            $('.bts-popup').removeClass('is-visible');
        }
    });
});

$('#password_signup, #confirm_password').on('keyup', function () {
    if ($('#password_signup').val() == $('#confirm_password').val()) {
        $('#message').html('password matching').css('color', 'green');
    } else
        $('#message').html('password not matching').css('color', 'red');
});