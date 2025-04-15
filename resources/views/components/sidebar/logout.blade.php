<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="bg-sketch-secondary w-full px-4 py-2 poppins-medium text-lg rounded-lg">
        Log out
    </button>
</form>