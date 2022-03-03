<div>
  <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

      <div class="mb-4">
        <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Post Show</h1>
      </div>

      <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
        <form method="POST" action="#">
          <!-- Title -->
          <div>
          <label class="block text-sm font-bold text-gray-700 " for="title">
                  title:<span class="text-xs text-gray-500">{{ $editData->title }}"</h3>
                </label>
            <div class="flex items-center mb-4 space-x-2">
            <label class="block text-sm font-bold text-gray-700" for="body">
                  Description: <span class="text-xs text-gray-500"> {{ $editData->body }}"</span>
                </label>
            </div>
            <label class="block text-sm font-bold text-gray-700" for="category_id">
                  category_id:<span class="text-xs text-gray-500">{{ $editData->category_id }}"</p>

                </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
