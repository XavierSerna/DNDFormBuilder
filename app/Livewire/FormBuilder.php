<?php

namespace App\Livewire;

use Livewire\Component;
//use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

$miVariable =  "valor";
Log::info('Contenido de miVariable:', $miVariable);

class FormBuilder extends Component
{

    public $droppedItems = []; 

    #[On('addField')] 
    public function addField($type)
    {
        $this->droppedItems[] = $type;
        Log::info('addField recibió:', ['type' => $type]);
    }

/*     #[On('addField')]
    public function addField($type)
    {
        \Log::info("Received type in addField: {$type}");
    } */

/*
    protected $listeners = ['addField'];

    public function addField($type)
    {
    \Log::debug("addField called with type: {$type}");

    // Add a simple hardcoded array to the droppedItems list for testing
    $this->droppedItems[] = [
        'type' => 'text', // Hardcoded type
        'placeholder' => 'Hardcoded placeholder', // Hardcoded placeholder
        'name' => 'hardcoded_name_' . time(), // Hardcoded name with a unique suffix
    ];
    }
*/

    /*
    //#[On('addField')] 
    public function addField($type)
    {
    // Initialize default values for placeholder and name
    $placeholder = '';
    $name = '';

    // Determine the placeholder and name based on the type of the field
    switch ($type) {
        case 'text':
            $placeholder = 'Enter text';
            $name = 'text_field_' . time(); // Using time() to ensure a unique name
            break;

        case 'textarea':
            $placeholder = 'Enter additional information';
            $name = 'textarea_field_' . time();
            break;

        case 'checkbox':
            // For checkboxes, you may not need a placeholder
            $name = 'checkbox_field_' . time();
            break;

        case 'email':
            $placeholder = 'Enter email address';
            $name = 'email_field_' . time();
            break;

        case 'number':
            $placeholder = 'Enter number';
            $name = 'number_field_' . time();
            break;
    }
        // Add the new field to the droppedItems array
        $this->droppedItems[] = [
            'type' => $type,
            'placeholder' => $placeholder,
            'name' => $name,
        ];
    }
    */

    /*
    public function addField($type)
    {
        // Logic to add a new field of type $type
        // This could involve updating an array or a database record

        // Add a new item to the array with the type set
        $this->droppedItems[] = [
            'type' => $type,
            'placeholder' => '', // perhaps set this dynamically or based on the type
            'name' => '', // Same here for the name
        ];
    }
    */
    
    public $things = [
        ['id' => 1, 'type' => 'email', 'label' => 'Email'],
        ['id' => 2, 'type' => 'radio', 'label' => 'Radio'],
        ['id' => 3, 'type' => 'checkbox', 'label' => 'Checkbox'],
        ['id' => 4, 'type' => 'dropdown', 'label' => 'Dropdown'],
        ['id' => 5, 'type' => 'textarea', 'label' => 'Textarea'],
    ];
    
    public function reorder($orderedIds)
    {
        $this->things = collect($orderedIds)->map(function ($id) {
            return collect($this->things)->where('id', (int) $id['value'])->first();
        })->toArray();
    }

    public function render()
    {
        return view('livewire.form-builder');
    }

}
