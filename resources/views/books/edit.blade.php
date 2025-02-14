<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Edit Buku</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" name="title" id="title" value="{{ $book->title }}" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-medium mb-2">Penulis</label>
                <input type="text" name="author" id="author" value="{{ $book->author }}" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="publisher" class="block text-gray-700 font-medium mb-2">Penerbit</label>
                <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="publish_year" class="block text-gray-700 font-medium mb-2">Tahun Terbit</label>
                <input type="number" name="publish_year" id="publish_year" value="{{ $book->publish_year }}" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="3" 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $book->description }}</textarea>
            </div>

            <x-primary-button type="submit" 
                class="bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Update
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
