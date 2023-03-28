$(document).ready(function () {

    **$('<img src="/Images/ajax-loader.gif"')
    .appendTo(#someID)**
    
    ...<ajax call to load page>...
    
     **$('#someID').find('img').remove();**      
    
    
    });