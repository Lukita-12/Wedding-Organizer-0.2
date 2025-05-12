@props(['errorFor'])

@error ($errorFor)
    <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
@enderror