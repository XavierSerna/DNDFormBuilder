<div>

<!-- Field Types Area: the draggable field types will be displayed -->
<div class="d-flex flex-wrap justify-content-start mb-4">
    <!-- Loop through each type and create a element. (associative array is embedded within foreach) -->
    @foreach(['text' => 'Text', 'textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'select' => 'Dropdown', 'number' => 'Number', 'email' => 'Email', 'tel' => 'Phone'] as $type => $label)
        <!-- Draggable Field Button ('draggable' attribute) -->
        <div class="p-2">
            <!-- it gives a [$type] value to hold to each button-->
            <button class="btn btn-outline-primary draggable-field" draggable="true" data-type="{{ $type }}" 
            ondragstart="startDrag(event, '{{ $type }}')">
                <!-- sets the text of each button based on the [$label] variable -->
                {{ $label }}
            </button>
        </div>
    @endforeach
</div>

<div class="droppable-area p-3 mb-4 border rounded bg-light"
    ondrop="drop(event)"
    ondragover="allowDrop(event)">
    <!-- 
    @foreach($droppedItems as $droppedItem)
        @switch($droppedItem['type'])
        @case('text')
            <input type="text" placeholder="{{ $droppedItem['placeholder'] ?? '' }}">
            @break
        @case('textarea')
            <textarea placeholder="{{ $droppedItem['placeholder'] ?? '' }}"></textarea>
            @break
        @case('checkbox')
            <input type="checkbox" name="{{ $droppedItem['name'] ?? '' }}">
            @break
        @default
        @endswitch
    @endforeach
     -->
    @foreach ($droppedItems as $droppedItem)
    <div>
        tipo de campo: {{ $droppedItem }}
    </div>
    @endforeach
</div>


<div class="container p-3 mb-4">
    <ul wire:sortable="reorder" class="list-group">
        @foreach ($things as $thing)
            <li wire:sortable.item="{{ $thing['id'] }}" draggable="true" wire:key="{{ $thing['id'] }}" class="list-group-item">
                @switch($thing['type'])
                    @case('email')
                        <input type="email" placeholder="{{ $thing['label'] }}">
                    @break
                    @case('radio')
                        <div>
                            <input type="radio" name="radio_option" value="option1"> Hungry<br>
                            <input type="radio" name="radio_option" value="option2"> Not Hungry<br>
                        </div>
                    @break
                    @case('checkbox')
                        <div>
                            <input type="checkbox" name="checkbox_option1" value="option1">meat<br>
                            <input type="checkbox" name="checkbox_option2" value="option2">vegetables<br>
                            <input type="checkbox" name="checkbox_option3" value="option3">water<br>
                        </div>
                    @break
                    @case('dropdown')
                        <select>
                            <option value="option1">quinua</option>
                            <option value="option2">potato</option>
                            <option value="option3">chicken</option>
                        </select>
                    @break
                    @case('textarea')
                        <textarea placeholder="Additional Information for your dish"></textarea>
                    @break

                @endswitch
            </li>
        @endforeach
    </ul>
</div>

</div>
