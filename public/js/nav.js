$(document).ready(function(){
    
    $( '#app .navbar-nav a' ).on( 'click', function () {
        $( '#app .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
        $( this ).parent( 'li' ).addClass( 'active' );
    });
});