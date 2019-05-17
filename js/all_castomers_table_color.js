$(document).ready(function(){
  $("#allcastomers_table tr").click(function(){
    $("#allcastomers_table tr").removeClass("active");
    $(this).addClass("active");
  });
});
