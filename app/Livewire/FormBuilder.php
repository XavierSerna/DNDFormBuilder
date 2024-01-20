<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormField; //conecta a la DB
use Livewire\Attributes\On; //para que escuche las llamadas de eventos
use Illuminate\Support\Facades\Log;

class FormBuilder extends Component
{

    public $formFields;

    public function mount()
    {
        $this->formFields = FormField::all();
    }

    #[On('addField')] 
    public function addField($type)
    {
        $this->droppedItems[] = $type;
        Log::info('addField recibió:', ['type' => $type]);
    }

    #[On('elementoArrastrado')]
    public function manejarElementoArrastrado($tipo)
    {
        Log::info('addField recibido con el valor: ' . $tipo);
        $formField = new FormField;
        $formField->type = $tipo;
        $formField->save();
        $this->formFields = FormField::all();
    }

    public function delete($id)
    {
        $formField = FormField::find($id);
        if($formField) {
            $formField->delete();
            $this->formFields = FormField::all();
        }
    }
    
    public function render()
    {
        return view('livewire.form-builder');
    }

}
