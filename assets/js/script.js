$(function(){

    // Storing some elements in variables for a cleaner code base

    var chatForm = $('.chat-form'),
        form = chatForm.find('form'),
        nameElement = form.find('#user-name'),
        commentElement = form.find('#user-comment'),
        ul = $('ul.message-content');


    // Load the comments.
    load();
    
    // On form submit, if everything is filled in, publish the shout to the database
    
    var canPostComment = true;

    form.submit(function(e){
        e.preventDefault();

        if(!canPostComment) return;
        
        var name = nameElement.val().trim();
        var comment = commentElement.val().trim();

        if(name.length && comment.length && comment.length < 240) {
        
            publish(name, comment);

            // Prevent new shouts from being published

            canPostComment = false;

            // Allow a new comment to be posted after 5 seconds

            setTimeout(function(){
                canPostComment = true;
            }, 5000);

        }

    });


    // Automatically refresh the shouts every 20 seconds
    setInterval(load,20000);


    // Store in the database
    
    function publish(name,comment){
    
        $.post('publish.php', {name: name, comment: comment}, function(){
            nameElement.val("");
            commentElement.val("");
            load();
        });

    }
    
    // Fetch the latest shouts
    
    function load(){
        $.getJSON('./load.php', function(data) {
            appendComments(data);
        });
    }
    
    // Render an array of shouts as HTML
    
    function appendComments(data) {

        ul.empty();

        data.forEach(function(d){
            ul.append('<li class="well">'+
                '<strong>' + d.name + ' : </strong>' + d.text +
                '<p>' + d.timeAgo + '</p>'+
            '</li>');
        });

    }

});