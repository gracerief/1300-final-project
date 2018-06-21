var main = function(){
  // Animations
  var scroll = new SmoothScroll('a[href="index.php#about"]', {
    speed: 1000,
    offset: 0
  });
  $('#header h1').show('fade', 2000);

  $('.headshot').hover(function() {
    console.log(this);
    $(this).children('.description').stop(true,true).fadeIn(500);
  }, function() {
    $(this).children('.description').stop(true,true).fadeOut(500);
  });

  // Form Validation
  $("#mainForm").on("submit", function() {
    var formValid = true;
    var nameIsValid = $("#name").prop("validity").valid;
    if(nameIsValid) {
      $("#nameError").hide();
    } else {
      $("#nameError").show();
      formValid = false;
    }

    //Email
    if($("#email").prop("validity").valueMissing) {
      $("#emailError").show();
      formValid = false;

    } else {
      $("#emailError").hide();
    }

    if($("#email").prop("validity").typeMismatch) {
      $("#emailErrorFill").show();
      formValid = false;

    } else {
      $("#emailErrorFill").hide();
    }

//message
    var messageValid = $("#msg").prop("validity").valid;
    if(messageValid){
      $("#msgError").hide();
      formValid = true;
    }else{
      $("#msgError").show();
      formValid = false;
    }
    return formValid;

  });

  //Listserv Validation
  $('#mail').on('submit', function() {
    var servValid = true;

    if($("#mailinglist").prop("validity").valueMissing) {
      $("#listError").show();
      servValid = false;
    } else {
      $("#listError").hide();
    }

    if($("#mailinglist").prop("validity").typeMismatch) {
      $("#listErrorFill").show();
      servValid = false;
    } else {
      $("#listErrorFill").hide();
    }

    return servValid;
  });
  
};

$(document).ready(main);

//CREDITS: smooth-scroll library from https://github.com/cferdinandi/smooth-scroll
