function removeDuplicates(json_all) {
    var arr = [],
        collection = [];

    $.each(json_all, function (index, value) {
        if ($.inArray(value.name, arr) == -1) {
            arr.push(value.name);
            collection.push(value);
        }
    });
    return collection;
}

var json = $.getJSON({'url': '/items.json', 'async': false});
var images = removeDuplicates(JSON.parse(json.responseText));

$(function() {
    $( "#search" ).autocomplete({
        minLength: 0,
        max: 5,
        source: images,
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
