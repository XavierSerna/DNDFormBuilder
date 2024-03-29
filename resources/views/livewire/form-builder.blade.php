<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
<div class="m-4">
    @foreach(['text'=>'Text', 'textarea'=>'Textarea', 'checkbox'=>'Checkbox', 'radio' => 'Radio', 'select' => 'Dropdown', 'number' => 'Number', 'email' => 'Email', 'tel' => 'Phone'] as $type=>$label)
    <button draggable="true" ondragstart="startDrag(event, '{{ $type }}')" class="btn btn-primary" data-type="{{ $type }}">
        {{ $label }}
    </button>
    @endforeach
</div>

<p>Drag the buttons to this box:</p>
<table ondragover="allowDrop(event)" ondrop="drop(event)" class="table table-striped m-1 border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Order</th>
            <th>Type</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
        </tr>
    </thead>
    <tbody wire:sortable="updateFieldOrder">
        @foreach ($this->formFields as $formField) <!-- add $index => ?-->
            <tr wire:sortable.item="{{ $formField->id }}" wire:key="form-field-{{ $formField->id }}">
                <td wire:sortable.handle>{{ $formField->id }}</td>
                <td>{{ $formField->order }}</td>
                <td>{{ $formField->type }}</td>
                <td>{{ $formField->created_at }}</td>
                <td>{{ $formField->updated_at }}</td>
                <td><button wire:click="delete('{{ $formField->id }}')" class="btn btn-danger">Delete</button></td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
