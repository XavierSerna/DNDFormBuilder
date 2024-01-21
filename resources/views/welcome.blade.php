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
      event.dataTransfer.setData("text", type);
    }

    function allowDrop(event) {
      event.preventDefault();
    }

    function drop(event) {
      event.preventDefault();
      var type = event.dataTransfer.getData("text");
      Livewire.dispatch('itemDropped', { type: type});
    }
  </script>
</body>
</html>