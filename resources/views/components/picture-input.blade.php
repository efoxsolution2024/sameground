<div class="flex items-center" x-data="picturePreview()">
    <div class="rounded-md bg-gray-200">
        <img id="preview" src="" alt="" class="w-24 h-24 rounded-md object-cover">
    </div>
    <div>   
        <div x-data="{ openFileInput: function() { $refs.pictureInput.click(); } }">
            <button @click="openFileInput" class="relative w-22 bg-gray-700 px-4 h-10 rounded-xl ml-3 text-white">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                    </svg>
                    Upload picture
                </div>
                <input @change="showPreview($event)" type="file" name="picture" x-ref="pictureInput" class="absolute inset-0 -z-10 opacity-0">
            </button>
        </div>
    </div>

    <script>
        function picturePreview() {
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        document.getElementById('preview').src = src;
                    }
                } 
            }
        }
    </script>
</div>
