@include('layouts.master')

<header class="m-full text-center">
    <a href="/publicaciones/">volver</a>
    <h1 class="text-4xl font-black text-gray-900 dark:text-white">{{ $publicacion->titulo }}</h1>
</header>

<article class="flex max-w-full">

    <img class="block max-h-80 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800" src="/storage/{{$publicacion->imagen_url}}" alt="image description">

    <p class="ml-auto">{{$publicacion->contenido}}</p>
</article>




@include('layouts.footer')