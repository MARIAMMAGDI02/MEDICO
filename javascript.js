function info(){
    var info = document.getElementsByClassName('row');
    for(var i = 0 ; i < info.length ; i++)
    {
        info[i].style.display = 'flex'
    }
    var h2 = document.getElementsByClassName('h2');
    for(var i = 0 ; i < info.length ; i++)
    {
        h2[i].style.display = 'flex'
    } 
    var specialist = document.getElementsByClassName('specialist');
    for(var i = 0 ; i < info.length ; i++)
    {
        specialist[i].style.display = 'flex'
    } 

}

