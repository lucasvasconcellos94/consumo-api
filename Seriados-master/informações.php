
<?php 
function getseries(){
    
    

if (isset ($_POST['serieName'])){
    $filme = $_POST['serieName'];
    
    $series = getSitcom($filme);
    $reply = (object)[
        'Title' => $series->name,
        'Year' => $series->premiered,
        'Type' => $series->genres[0],
        'Poster' => $series->image->original
    ];
 
}else {
    $reply = seriesEmpty();
   
}


return $reply;
}

function seriesEmpty(){
    return (object)[
        'Title' => '',
        'Year' => '',
        'Type' => '',
        'Poster' => ''
    ];
}

function getSitcom(String $filme){
    $url = "http://api.tvmaze.com/singlesearch/shows?q='{$filme}'";
    return json_decode(file_get_contents($url));

  
}