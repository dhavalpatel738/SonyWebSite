$(function() {
             $( "#search" ).autocomplete({
                  minLength: 0,
                  source: items,
                  focus: function( event, ui ) {
                    $( "#search" ).val( ui.item.label );
                    return false;
                  },
                  select: function( event, ui ) {
                    $( "#search" ).val( ui.item.label );            
                    return false;
                  }
                })
                .autocomplete( "instance" )._renderItem = function( ul, item ) {
                  return $( "<li>" )
                    .append( "<div>" + item.label + "</div>" )
                    .appendTo( ul );
                };
} );

