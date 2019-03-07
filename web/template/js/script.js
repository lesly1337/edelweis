
$('#header .application a').click(function() {
    $('#grey-background').fadeToggle( "slow", "linear" );
});

$('#close').click(function() {
    $('#grey-background').fadeOut( "slow", "linear" );
});