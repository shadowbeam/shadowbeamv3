$(document).ready(function () {

/**
* Control running
*/
projectsection = new function() {

  var section = $('#section-projects');
  var project_data;


  var init = function(){
    section.append(spinner.clone());
    fetchProjects();


  }

  section_dir['#section-projects'].init = init;


  var setupPreviews = function(){
    $.each(project_data, function(i,preview){

      section.append(preview.title);

    });

  }


  var fetchProjects = function(){

    var jqxhr = $.getJSON('themes/watson/php/project-previews.php', function(data) {
      project_data = data;
    })
    .done(function() {
      setupPreviews();
    })

  }


  return {
    init: init
  };

}

});
