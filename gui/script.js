 var url = "";
 var yt = {};
 var feedUrl = "";

$(document).ready(function(){
   $("#ytUrl").bind('paste', updateClassification)
    .bind('keyup', updateClassification);

});

function updateClassification(){
    $("#ytClass").addClass("hidden");

    console.log("");
    console.log("update class");
    url = $("#ytUrl").val().trim();
    yt = ytClassification(url);

    console.log(yt);

    if(yt == false){
        $("#ytClass").removeClass("hidden");
        $("#ytClass div").text("not a youtube url");
        return;
    }

    if(yt.type == "video"){
        $("#ytClass").removeClass("hidden");
        $("#ytClass div").html("you can't make a rss feed from a single video<br>use a channel of playlist");
        return
    }

    updateUrl();
}

function ytClassification(url) {
    console.log(url);
    
    var ytTest;
    ytTest = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\//;

    if(ytTest.exec(url) == null){
        console.log( "this is not a yt url");
        return false;
    }

    var typeRegex = /\/\w+(\/|\?)/;
    var typeRes = typeRegex.exec(url);
    var type = typeRes[0];

    type = type.replace(/\//g, "");
    type = type.replace(/\\/g, "");
    type = type.replace(/\?/g, "");
    type = type.replace(/ /g, "");
    type = type.replace(/(watch)/g, "video");
    type = type.toLowerCase();

    var idRegex = /[\/|=]{1}[A-Za-z0-9\-]+$/;

    var idRes = idRegex.exec(url);
    var id = idRes[idRes.length -1];

    id = id.replace(/\//g, "", id);
    id = id.replace(/\\/g, "", id);
    id = id.replace(/=/g, "", id);

    return {"type": type, "id": id};
}

 function makeUrl(){
     feedUrl = "http://"+domain+".cc/youtube-rss/rss.php?type=yt:"+yt.type+"&id="+yt.id;
 }

 function updateUrl(){
     makeUrl();
     $("#feedLink").attr("href", feedUrl);
     $("#feedUrl").val(feedUrl);
 }