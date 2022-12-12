$(document).ready(function(){//ajax navbar - excluding the searchbar
    $("body>nav a, body>.container a").on("click", function(event){//selecting(target could be also id... etc WHICH IS BETTER) all anchor tags in nav element directly under body
        $target = $(this);//caching the ancor tag above
        event.preventDefault();
        $("main").fadeOut(300,function(){
            loadMain($target);//loads everything inside <main> <main>
        });
    });
        
    function loadMain($element){//this loads everything that belongs into element <main> under the given href
        $("main").load($element.attr("href")+" #main",completeFunction);
    }
    
    //ajax search bar
    $("body>nav form>button").on("click", function(event){ //we need to target the button, otherwise the function play once the forms search field is cliked
        event.preventDefault();
        $target = $(this).parent();//the parent parameter targets the dirrect parent searchfield of the child button
        
        $("main").fadeOut(300,function(){
            loadSearch($target);
        });
    });
    function loadSearch($element){//this loads everything under form search
        data = {};//makes data exist in the whole following function
        
        /*data = { this is just to show how the data structure is looking like
            inputName: "inputValue",
            input2Name: "input2Value"
        };*/
        
        $element.find("input").each(function(index,input){//find all get variables
            data[input.name] = input.value;
        });
        $("main").load($element.attr("action")+" main",data,completeFunction);//sends the data inputed into search form
    }
    
    function completeFunction(responseText, textStatus, request){//If there is an error this writes a msg
        if(textStatus == "error"){
            $("main").text("An error occured during request: "+ request.status+" "+request.statusText);
        }
        else{
            $("main").fadeIn(300);
        }
    }
});

