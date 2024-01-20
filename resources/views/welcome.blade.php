<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Builder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  @livewireStyles
</head>
<body>

  <div class="container mt-5">
    @livewire('form-builder')
  </div>

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
  <script>
    function startDrag(event, type) {
      console.log("arrastrando un elemento: ", type);
      event.dataTransfer.setData("text", type);
      //event.dataTransfer.setData("type", type); //["type"] is the key, and [type] the value.
    }

    function allowDrop(event) {
      console.log("Elemento arrastrado sobre el área de destino");
      event.preventDefault();
    }

    function drop(event) {
      event.preventDefault();
      var type = event.dataTransfer.getData("text");
      //var type = event.dataTransfer.getData("type"); // Retrieves the data set on the key ["type"] during drag
      console.log("Elemento soltado de tipo:", type);
      Livewire.dispatch('elementoArrastrado', { tipo: type});
    }
  </script>
</body>
</html>