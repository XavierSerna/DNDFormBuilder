<div>
<h4>Knowing others is intelligence; knowing yourself is true wisdom.</h4>

<!-- Draggable Field Types Area -->
<div wire:sortable="updateOrder" class="d-flex flex-wrap justify-content-start mb-4">
    @foreach(['text' => 'Text', 'textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'select' => 'Dropdown', 'number' => 'Number', 'email' => 'Email', 'tel' => 'Phone'] as $type => $label)
        <div wire:sortable.item="{{ $type }}" class="p-2">
            <button class="btn btn-outline-primary" wire:sortable.handle>
                {{ $label }}
            </button>
        </div>
    @endforeach
</div>

<!-- Form Construction Area -->
<div class="form-construction-area border p-3 mb-4" id="formConstructionArea">
    <p>Drag and drop the fields here to build your form.</p>
    <!-- Add dynamic rendering of fields here -->
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-end">
    <button class="btn btn-success" wire:click="saveForm">Save Form</button>
</div>


<!-- Field Types Area: This is where the draggable field types will be displayed -->
<div class="d-flex flex-wrap justify-content-start mb-4">
    <!-- Loop through each field type and create a draggable element for it -->
    @foreach(['text' => 'Text', 'textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'select' => 'Dropdown', 'number' => 'Number', 'email' => 'Email', 'tel' => 'Phone'] as $type => $label)
        <!-- Draggable Field Button: Each button is styled with Bootstrap and has a 'draggable' attribute -->
        <div class="p-2">
            <button class="btn btn-outline-primary draggable-field" draggable="true" data-type="{{ $type }}">
                {{ $label }}
            </button>
        </div>
    @endforeach
</div>

<!-- Form Construction Area: This is the area where the user will drag fields to construct the form -->
<div class="form-construction-area border p-3 mb-4" id="formConstructionArea">
    <!-- Placeholder Text: Informs users to drag fields here -->
    <p>Drag and drop the fields here to build your form.</p>
    <!-- Dynamic Form Fields: This area will be updated dynamically as fields are dragged into it -->
    <!-- You will handle this in your Livewire component's PHP class -->
</div>
    
<!-- Action Buttons: These buttons perform actions like saving the form -->
<div class="d-flex justify-content-end">
    <!-- Save Form Button: Triggers a method in the Livewire component to save the form -->
    <button class="btn btn-success" wire:click="saveForm">Save Form</button>
</div>

</div>
