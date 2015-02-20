// After the API loads, call a function to enable the search box.
function handleAPILoaded() {
  $('#search-button').attr('disabled', false);
}

// Search for a specified string.
function search() {
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet'
  });

  request.execute(function(response) {
    var res = response.result;
    var str = "";
    for(var i=0; i < res.items.length; i++){
      var v = res.items[i];
      str += '<p class="results-list" data-id="'+ v.id.videoId +'"><img class="thumbnail" src="'+v.snippet.thumbnails.medium.url+'"/><a href="#sec_player">'+v.snippet.title+'</a></p>'

    }
    $('#search-container').html(str);
  });
}