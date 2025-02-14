<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Buku</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul:</label>
                <input type="text" name="title" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Penulis:</label>
                <input type="text" name="author" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Penerbit:</label>
                <input type="text" name="publisher" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Tahun Terbit:</label>
                <input type="number" name="publish_year" required 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <textarea name="description" rows="3" 
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <x-primary-button type="submit" 
                class=" bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Simpan
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
