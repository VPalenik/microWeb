//script pro přesouvání položek v menu
$(document).ready(function(){
    $("#menuStranek").sortable({
        "update":function(){
            var poradi = $("#menuStranek").sortable('toArray', {'attribute':'data-stranka-id'});
            console.log(poradi);
            
            $.ajax({
                "url":"index.php?action=nastavPoradi",
                "method":"POST",
                "data":{"poradi":poradi
                }
            });
        }
        });
});

$(document).ready(function(){
    $("#menuSideBar").sortable({
        "update":function(){
            var poradi = $("#menuSideBar").sortable('toArray', {'attribute':'data-stranka-id'});
            console.log(poradi);
            
            $.ajax({
                "url":"index.php?action=nastavPoradi",
                "method":"POST",
                "data":{"poradi":poradi
                }
            });
        }
        });
});

