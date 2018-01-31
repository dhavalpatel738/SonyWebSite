$(function() {
    $( "#search" ).autocomplete({
        minLength: 0,
        max: 5,
        source: items,
        focus: function( event, ui ) {
            $( "#search" ).val( ui.item.name );
                return false;
        },
        select: function( event, ui ) {
            $( "#search" ).val( ui.item.name );
                return false;
        }
    })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
            if(item.name == "dup") {
                return $("<li>");
            } else {
                return $( "<li>" )
                    .append( "<div>" + item.name + "</div>" )
                    .appendTo( ul );
            }
        };

    $("body").on("contextmenu",function(){
        return false;
    });
} );

