$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'php/cargar_nivel.php'
    })
    .done(function(listas_rep){
      $('#niveldos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los niveles')
    })
  
    $('#niveldos').on('change', function(){
      var id_nivel = $('#niveldos').val()
      $.ajax({
        type: 'POST',
        url: 'php/cargar_grado.php',
        data: {'id_nivel': id_nivel}
      })
      .done(function(listas_rep){
        $('#gradosdos').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un errror al cargar los grupos')
      })
    })



  //CArgamos los niveles y grupos del segundo hermano 
    $.ajax({
        type: 'POST',
        url: 'php/cargar_nivel.php'
      })
      .done(function(listas_rep){
        $('#niveltres').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un errror al cargar los niveles')
      })
    
      $('#niveltres').on('change', function(){
        var id_nivel = $('#niveltres').val()
        $.ajax({
          type: 'POST',
          url: 'php/cargar_grado.php',
          data: {'id_nivel': id_nivel}
        })
        .done(function(listas_rep){
          $('#gradostres').html(listas_rep)
        })
        .fail(function(){
          alert('Hubo un errror al cargar los grupos')
        })
      })
    
    //   $('#boton').on('click', function(){
    //    var niveldos = $('#niveldos option:selected').text()
    //    var gradosdos = $('#gradosdos option:selected').text()
  
    //     $('#nniveldos').html(niveldos)
    //     $('#ngradosdos').html(gradosdos)

    //   var niveltres = $('#niveltres option:selected').text()
    //      var gradostres = $('#gradostres option:selected').text()

    //      $('#nniveltres').html(niveltres)
    //      $('#ngradostres').html(gradostres)
    //   })
  
  })
