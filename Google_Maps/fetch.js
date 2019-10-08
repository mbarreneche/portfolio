

fetch("lugares.json")
      .then(function(response){
          return response.json();
      })
      .then(function(data){
        var lugares = JSON.stringify(data)
        console.log(lugares.length);});
      

      
