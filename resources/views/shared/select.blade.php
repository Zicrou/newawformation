@props([
    'label' => null,
    'name',
    'options' => [],
    'value' => null,
    'multiple' => false,
])

<div>

    @if($label)
        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $multiple ? $name.'[]' : $name }}"
        @if($multiple) multiple @endif

        class="block w-full rounded-lg border border-gray-300 bg-white
               px-4 py-2 shadow-sm
               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
               dark:border-gray-600 dark:bg-gray-700 dark:text-white">

        @foreach($options as $id => $text)

            <option
                value="{{ $id }}"
                @selected(
                    $multiple
                        ? collect(old($name, $value))->contains($id)
                        : old($name, $value) == $id
                )>

                {{ $text }}

            </option>

        @endforeach

    </select>

    @error($name)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>
