<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormField;

class FormBuilder extends Component
{
    public $fields = [];

    public function mount()
    {
        // Inicializar los campos al montar el componente
        $this->fields = FormField::orderBy('order')->get()->toArray();
    }

    // This method would be called whenever the order of the fields changes
    public function updateOrder($orderedIds)
    {
        // Iterate over the ordered IDs, which are given based on the new order after drag-and-drop
        foreach ($orderedIds as $order => $id) {
            // Find the field by ID and update its order
            \App\Models\FormField::where('id', $id)->update(['order' => $order]);
        }
    
        // Fetch the updated fields from the database to reflect the new order
        $this->fields = \App\Models\FormField::orderBy('order')->get()->toArray();
    }
    
    public function render()
    {
        // Fetch and order the fields from the database
        $this->fields = \App\Models\FormField::orderBy('order')->get()->toArray();
    
        return view('livewire.form-builder', [
            'fields' => $this->fields,
        ]);
    }
}
