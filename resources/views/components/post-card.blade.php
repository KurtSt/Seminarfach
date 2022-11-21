@props(['post'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
        </div>
        

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                   <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                <b>Tickets are still available!</b> 
                <img src="{!! $post->thumbnail !!}" width="200" height="300">
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?u=420" alt="Lary avatar">
                    
                    <div class="ml-3">
                        <h5 class="font-bold">
                        <a href="/?author=King Ticket CEO">King Ticket CEO</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->id }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                    
                </div>
            </footer>
        </div>
    </div>
</article>
