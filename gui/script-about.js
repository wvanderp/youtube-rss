$.get("../README.md", function(data){
    var md = markdown.toHTML( data );
    $("#md").html(md);
});