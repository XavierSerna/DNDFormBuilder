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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
  <script>
    function startDrag(event, type) {
      // Set the data type being dragged
      event.dataTransfer.setData("type", type); //["type"] is the key, and [type] the value.
      console.log('dragging!', type);
    }

    function allowDrop(event) {
      event.preventDefault(); // Prevents default behavior
      console.log('allow drop!');
    }

    function drop(event) {
      event.preventDefault(); // Prevent default behavior
      var type = event.dataTransfer.getData("type"); // Retrieves the data set on the key ["type"] during drag
      console.log('dropping!', type);
      // Livewire.emit()
      Livewire.dispatch('addField', type); // Call Livewire function to add a new field of this type
      // Livewire function call, sends an event named [addField] to the Livewire component (FormBuilder), along with the [type] variable as its parameter. This will trigger a method in the Livewire component that will handle the addition of a new field of the specified type.
    }
  </script>

</body>
</html>