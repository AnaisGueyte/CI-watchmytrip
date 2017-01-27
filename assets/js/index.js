$(function () {
  $('li>a').on('click', function(e) {
    e.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
      scrollTop: $(this.hash).offset().top
    }, 700, function(){
      window.location.hash = hash;
    });
  });
});


$(function (){
  $("#afficher").click(function() {
    $("#afficher").hide();
    $(".alert").show("slow");
  }); 
  $(".close").click(function() {
    $(".alert").hide("slow");
    $("#afficher").show();
  }); 
}); 


