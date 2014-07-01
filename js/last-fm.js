


/**
* Control music
*/
var musicsection = new function() {
    var table = $('#music-table');

    var buffer = "";


    /* Control one page sizes*/
    $(window).on('resizeEnd', function() {
        resizeArtwork();
    });

    var resizeArtwork = function(){
        console.log("Resize Artwork Tiles");

        var s = section_dir['#section-music'];
        var j = s.obj.find('.jumbotron');

        var h = s.height - j.outerHeight(true);
        table.height(h);
    }

    var init = function(){
        var url = "http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=shadowbeam&api_key=c4d61c99dc3459b1c877d62bbfa5e7b2&limit=9&period=7day&format=json";

        var jqxhr = $.getJSON(url, function(data) { parseArtists(data) })

        .always(function() {
            table.append(buffer);
            resizeArtwork();
        });
    }

    var parseArtists = function(data){
        $.each(data.topartists.artist, function(i,artist){

            var found = findUrl(artist.image, "mega");
           // buffer+= '<div id="img-' + i +  '" class="td imgwrap med" style="background-image:url(' + found + ')">';
           buffer+= '<div class="tr col-md-4"><img class="artwork" src="' + found + '"/>';
           buffer += "<div class='td rank'>" + artist['@attr'].rank;
           buffer += "</div><div class='td details'><span class='artist'><a href='"+ artist.url + "'>" + artist.name +"  </a></span>";
           buffer+= "<br><span class='count'> Played "+ artist.playcount +" times</span></div></div></div>";

       });
    }

    var findUrl = function(image, size) {
        var n, entry;

        if(typeof image == "undefined")
            return null;
        
        else{

            for (n = 0; n < image.length; ++n) {
                entry = image[n];

                if (entry.size == size) {  
                    return entry["#text"]; 
                }
            }
        }
        return null; 
    }

    init();
}



