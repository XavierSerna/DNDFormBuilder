<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormField; //conecta a la DB
use Livewire\Attributes\On; //para que escuche las llamadas de eventos

class FormBuilder extends Component
{

    public $formFields;

    public function mount()
    {
        //$this->formFields = FormField::all();
        $this->formFields = FormField::orderBy('order')->get();
    }

    #[On('addField')] 
    public function addField($type)
    {
        $this->droppedItems[] = $type;
        Log::info('addField recibió:', ['type' => $type]);
    }

    #[On('itemDropped')]
    public function handleItemDropped($type)
    {
        $order = FormField::max('order') + 1;
        $formField = new FormField;
        $formField->type = $type;
        $formField->order = $order;
        $formField->save();
        //$this->formFields = FormField::all();
        $this->formFields = FormField::orderBy('order')->get();
    }

    public function updateFieldOrder($orderedIds)
    {
        foreach ($orderedIds as $item) {
            $formField = FormField::find($item['value']);
            if ($formField) {
                $formField->order = $item['order'];
                $formField->save();
            }
        }
    
        $this->formFields = FormField::orderBy('order')->get();
    }

    public function delete($id)
    {
        $formField = FormField::find($id);
        if($formField) {
            $formField->delete();
            //$this->formFields = FormField::all();
            $this->formFields = FormField::orderBy('order')->get();

        }
    }
    
    public function render()
    {
        return view('livewire.form-builder');
    }

}
