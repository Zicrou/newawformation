<div class="grid grid-cols-1 gap-6 md:grid-cols-2">

    {{-- Titre --}}
    <div>
        <label
            for="title"
            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
            Titre
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('name', $cour->title) }}"
            placeholder="Ex : Laravel, Flutter..."

            class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                    focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                    dark:border-gray-600 dark:bg-gray-700 dark:text-white
                    dark:focus:border-indigo-500
                    @error('title') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">

        @error('title')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Prix --}}
    <div>
        <label
            for="price"
            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
            Prix
        </label>

        <input
            type="text"
            id="price"
            name="price"
            value="{{ old('name', $cour->price) }}"
            placeholder="Ex : Laravel, Flutter..."

            class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                    focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                    dark:border-gray-600 dark:bg-gray-700 dark:text-white
                    dark:focus:border-indigo-500
                    @error('price') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">

        @error('price')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>

{{-- Description --}}
    <div>
        <label
            for="description"
            class="mb-2 mt-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            placeholder="Ex : Laravel, Flutter..."
            class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-4 text-gray-900 shadow-sm
            focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
            dark:border-gray-600 dark:bg-gray-700 dark:text-white
            dark:focus:border-indigo-500
           @error('description') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
            {{ old('description', $cour->description) }}
        </textarea>

        @error('price')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

{{-- Uploads --}}
<div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

    {{-- Thumbnail --}}
    <div>
        <label
            for="thumbnail"
            class="mb-2 block text-sm font-medium text-gray-700">
            Thumbnail
        </label>

        <input
            type="file"
            id="thumbnail"
            name="thumbnail"
            class="block w-full rounded-lg border border-gray-300
                   px-3 py-2 text-sm
                   file:mr-4 file:rounded-md file:border-0
                   file:bg-indigo-600 file:px-4 file:py-2
                   file:text-white hover:file:bg-indigo-700
                   @error('thumbnail') border-red-500 @enderror">

        @error('thumbnail')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Vidéo --}}
    <div>
        <label
            for="video"
            class="mb-2 block text-sm font-medium text-gray-700">
            Vidéo
        </label>

        <input
            type="file"
            id="video"
            name="video"
            class="block w-full rounded-lg border border-gray-300
                   px-3 py-2 text-sm
                   file:mr-4 file:rounded-md file:border-0
                   file:bg-indigo-600 file:px-4 file:py-2
                   file:text-white hover:file:bg-indigo-700
                   @error('video') border-red-500 @enderror">

        @error('video')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>

{{-- Tags --}}
<div class="mt-6">
    
    <label for="tags" class="block mb-2 text-sm font-medium text-gray-700">
    Tags
</label>

<select
    name="tags[]"
    id="tags"
    multiple
    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
    @foreach ($tags as $k => $v)
        <option @selected($cour->tags->contains($k)) value="{{ $k }}">{{ $v }}</option>
    @endforeach
</select>
    @error('tags')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Disponible --}}
<div class="mt-6">

    <input type="hidden" name="disponible" value="0">
    <input @checked(old('disponible')) type="checkbox" value="1" name="disponible" class="form-check-input @error('disponible') is-invalid @enderror" role="switch"
    id="disponible">
    <label class="form-check-label" for="disponible">Disponible</label>
    @error('disponible')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

{{-- Bouton --}}
<div class="mt-8 flex justify-end">

    <button
        type="submit"
        class="rounded-lg bg-indigo-600 px-6 py-2.5
               font-semibold text-white shadow
               transition hover:bg-indigo-700
               focus:outline-none focus:ring-2
               focus:ring-indigo-500">

        {{ $cour->exists ? 'Modifier' : 'Créer' }}

    </button>

</div>
<script>
ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
</script>