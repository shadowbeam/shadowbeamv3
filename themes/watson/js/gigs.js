


/**
* Control gigs
*/
var gigsection = new function() {

    $.getScript( "js/moment.min.js" )
    .done(function( script, textStatus ) {
        console.log( textStatus );
    });


    init = function(){
        fetchGigs();
    }

    fetchGigs = function(){

        $.getJSON("http://api.songkick.com/api/3.0/users/shadowbeam/events.json?location=clientip&apikey=7IGNhZBiAKIXs6Aw&per_page=5&order=asc&jsoncallback=?",
            function(data){ populateUpcoming(data) });

        $.getJSON("http://api.songkick.com/api/3.0/users/shadowbeam/gigography.json?reason=tracked_artist&apikey=7IGNhZBiAKIXs6Aw&order=desc&per_page=5&jsoncallback=?",
            function(data){ populateUpcoming(data) });
    }

    populateUpcoming = function(data){
        var up = section_dir['#section-gigs'].obj.find('.upcoming');

        var buffer = up;
        $.each(data.resultsPage.results.event, function(index, event){
            if(event.type=="Festival"){
                buffer.append(createEvent(event.displayName,event.id, event.start.date, event.uri, true));
            }else{
                buffer.append(createEvent(event.performance[0].artist.displayName,event.performance[0].artist.id, event.start.date, event.uri));
            }
        });

        console.log('populateUpcoming');
    }

    createEvent = function(artist, artist_id, date, event_url, is_festival){

        is_festival = (typeof is_festival === "undefined") ? false: is_festival;

        var artist = $('<span class="artist">').html(artist);
        var image = $('<img>');

        if(!is_festival){
            image.attr('src', 'https://ssl.sk-static.com/images/media/profile_images/artists/' + artist_id +'/huge_avatar');
        }
        else{
            image.attr('src', 'https://ssl.sk-static.com/images/media/profile_images/events/' + artist_id +'/col4');
        }

        var d = moment(date).format("Do MMMM YYYY");
        var date = $('<span class="date">').html(d);
        console.log(artist);
        return $('<div class="event col-md-3 col-xs-6">').append($('<a href="'+ event_url + '"></a>').append(artist, image)).append(date);
    }

    populatePast = function(data){

        console.log('populatePast');
    }

    return {
        init: init
    };

}



