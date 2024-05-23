/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    $("#accordion").accordion({
        heightStyle: "content"
    });
    $("#accordion").accordion();
    // Hover states on the static widgets
    $("#dialog-link, #icons li").hover(
            function() {
                $(this).addClass("ui-state-hover");
            },
            function() {
                $(this).removeClass("ui-state-hover");
            }
    );

    //$( "#accordion" ).accordion( "destroy" ); //dsativa o accordion
});

//abrir as abas ao passar o mouse
/*
 $(function() {
 $( "#accordion" ).accordion({
 event: "click hoverintent"
 });
 });
 
 
 $.event.special.hoverintent = {
 setup: function() {
 $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
 },
 teardown: function() {
 $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
 },
 handler: function( event ) {
 var currentX, currentY, timeout,
 args = arguments,
 target = $( event.target ),
 previousX = event.pageX,
 previousY = event.pageY;
 
 function track( event ) {
 currentX = event.pageX;
 currentY = event.pageY;
 };
 
 function clear() {
 target
 .unbind( "mousemove", track )
 .unbind( "mouseout", clear );
 clearTimeout( timeout );
 }
 
 function handler() {
 var prop,
 orig = event;
 
 if ( ( Math.abs( previousX - currentX ) +
 Math.abs( previousY - currentY ) ) < 7 ) {
 clear();
 
 event = $.Event( "hoverintent" );
 for ( prop in orig ) {
 if ( !( prop in event ) ) {
 event[ prop ] = orig[ prop ];
 }
 }
 // Prevent accessing the original event since the new event
 // is fired asynchronously and the old event is no longer
 // usable (#6028)
 delete event.originalEvent;
 
 target.trigger( event );
 } else {
 previousX = currentX;
 previousY = currentY;
 timeout = setTimeout( handler, 100 );
 }
 }
 
 timeout = setTimeout( handler, 100 );
 target.bind({
 mousemove: track,
 mouseout: clear
 });
 }
 };
 */

$(function() {
    $("#accordion").accordion({
        collapsible: true
    });
});