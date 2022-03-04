
      <html lang="en">
      <head>
        <!-- Required meta tags -->
        
        <!-- Tailwind CSS -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


      </head>
      <body>

        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
          <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

        <div class="p-10">
          <!--Card 1-->
          
              <div class="flex items-center">
                <div class="text-md" >
                <label name="category_id" class="font-bold">Title Post:: <p class="text-gray-900 leading-none"> {{ $editData->title }}</p>
  </label>
                </div>
              </div>
            </div>
             <div class="p-10">
          <!--Card 1-->
          
              <div class="flex items-center">
                <div class="text-md">
                <label name="category_id" class="font-bold">description: <p class="text-gray-900 leading-none">{{ $editData->body }}"</p>
  </label>
                </div>
              </div>
            </div>


             <div class="p-10">
          <!--Card 1-->
          
              <div class="flex items-center">
                <div class="text-md">
                <label name="category_id" class="font-bold">Category: <p class="text-gray-900 leading-none">{{ $editData->category->name }}"</p>
  </label>
                </div>
              </div>
            </div>
            </div>
         </div>

      </body>
      </html>





     