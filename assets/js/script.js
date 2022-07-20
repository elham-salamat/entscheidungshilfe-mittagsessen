var filter = {
    'category': null,
    'distance': null, 
    'price': null,
    'taste': null,
    'submit': false
}

var selectedResturants = {};

document.getElementById('category')
    .addEventListener('click', (event) => {
        filter.category = event.target.id;
    });

document.getElementById('distance')
    .addEventListener('click', (event) => {
        filter.distance = event.target.id;
    });
  
document.getElementById('price')
    .addEventListener('click', (event) => {
        filter.price = event.target.id;
    });

document.getElementById('taste')
    .addEventListener('click', (event) => {
        filter.taste = event.target.id;
    });


 



document.getElementById('reset')
    .addEventListener('click', (event) => {
        $("#resturants").html("");
        var li_items = "";
        for (let i = 0; i < 8; i++) {
            li_items += "<li>***</li>";
        }
        $("#resturants").html(li_items);
    });


document.getElementById('filtered-list')
    .addEventListener('click', (event) => {
        filter.submit = true, 
        console.log(filter)
        $.ajax(
            {
                url:'http://localhost/Entscheidungshilfe_Mittagsessen/php/resturantsfinder.php',
                type:"POSt",
                data:filter,
                success:function(data, textStatus, jqXHR)
                {
                    console.log(data);
                    $("#resturants").html("");
                    var li_items = "";
                    for(let i = 0; i < data.length; i++)
                    {
                        li_items += "<li>"+data[i].Name+" | ($)"+data[i].Preis+" | (m)"+data[i].Entfernung+" | "+data[i].VeggieTauglich+"</li>";
                    }
                    for(let i = data.length; i < 8; i++)
                    {
                        li_items += "<li>***</li>";
                    }
                    $("#resturants").html(li_items);
                },
            }
        );
        filter = {
            'category': null,
            'distance': null, 
            'price': null,
            'taste': null,
            'submit': false
        }
        
    });


    
    $("#resturants").html("");
    var li_items = "";
    for (let i = 0; i < 8; i++) {
        li_items += "<li>***</li>";
    }
    $("#resturants").html(li_items);