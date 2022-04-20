<x-frontend>
    <x-slot name="title">
        Category Post
    </x-slot>

    
    <section class="mt-4 ">
   
        <div class="container mx-auto px-2 lg:px-14 mb-10" >
            <h6 class="text-blue-700 py-2 md:py-6 font-bold text-lg md:text-xl">{{$category}}</h6>
            @if($posts_count > 0)
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-8 ">
                <!-- ... -->
                <div class="col-span-2 md:col-span-4">
                    <div  class="mb-6 md:mb-8 wrapper  antialiased " >
                        <div>
                            <a href="{{route('post.details', $posts->first()->slug)}}">
                                <img src="{{$posts->first()->image}}" alt=" random imgee" class="h-[350px] md:h-[530px] w-full object-cover object-center">      
                            </a>
                            <div class="relative px-4 -mt-14 md:-mt-20  ">
                                <div class="bg-black  p-4 md:p-6 rounded-lg shadow-lg"> 
                                    <a href="{{route('post.details', $posts->first()->slug)}}"> 
                                        <div class="text-white font-semibold text-lg md:text-3xl mb-2 font-poppin">
                                        {{$posts->first()->title}}
                                        </div>
                                        <p class="text-sm text-white tracking-wide  mt-4">
                                            By <span class="font-semibold">{{$posts->first()->user->first_name.' '.$posts->first()->user->last_name}}</span> 
                                            <span class="hidden md:inline-block">&bull; {{$posts->first()->created_at->diffForHumans()}}</span>
                                            <i class="ml-4 fa fa-eye"></i> {{$posts->first()->post_views->count()}}
                                        </p>
                                    </a>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($posts as $post)
                            @if ($posts->first()->id != $post->id)
                            <div class="gap-2 md:py-4 bg-white mt-2 grid grid-cols-3 md:grid-cols-1">
                                <div>
                                    <div class="">
                                        <div class="">
                                            <a href="{{route('post.details', $post->slug)}}">
                                                <img src="{{$post->image}}" alt="..." class="h-24 md:h-[300px] w-full" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div  class="col-span-2 md:col-span-1">
                                    <a href="{{route('post.details', $post->slug)}}">
                                        <div class="font-poppin text-gray-700 mt-2 md:mt-3 font-semibold text-md  md:text-xl" >
                                            {{$post->title}}
                                        </div>
                                        <p class="text-sm text-gray-600 tracking-wide  mt-4">
                                            <i class="fa fa-user"></i> <span class="font-semibold">{{$post->user->first_name.' '.$post->user->last_name}}</span> 
                                            <span class="hidden md:inline-block">&bull; {{$post->created_at->diffForHumans()}}</span>
                                            <i class="ml-4 fa fa-eye"></i> {{$post->post_views->count()}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="mt-10">
                            {{ $posts->onEachSide(3)->links() }}
                        </div>
                    </div>
                </div>
                <div class="md:ml-4 md:col-span-2" >
                    <div class=" mb-6">
                        <h6 class="md:text-center mb-4 font-bold text-lg md:text-2xl">Trending</h6>
                        <div class="border border-gray-200 -mt-2"></div>
                        <div class="bg-white mt-3 divide-y divide-gray-200">
                            @foreach ($trending_posts as $trending_post)
                            <div class="py-4 bg-white mt-2 grid grid-cols-3 md:grid-cols-1">
                                <div>
                                    <div class="md:flex md:flex-wrap md:justify-center">
                                        <div class="">
                                            <a href="{{route('post.details', $trending_post->slug)}}">
                                                <img src="{{$trending_post->image}}" alt="..." class="shadow rounded-full max-w-full h-24 md:h-60 align-middle border-none" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div  class="col-span-2 md:col-span-1">
                                    <a href="{{route('post.details', $trending_post->slug)}}">
                                        <div class="font-poppin text-gray-700 mt-2 md:mt-3 font-semibold text-md md:text-lg" >
                                            {{$trending_post->title}}
                                        </div>
                                        <p class="text-sm text-gray-800 tracking-wide  mt-4">
                                            By <span class="font-semibold">{{$trending_post->user->first_name.' '.$trending_post->user->last_name}}</span> 
                                            <span class="hidden md:inline-block">&bull; {{$trending_post->created_at->diffForHumans()}}</span>
                                            <i class="ml-4 fa fa-eye"></i> {{$trending_post->post_views->count()}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                     
                    </div>
                    <img style="" class="w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                    <img style="" class="hidden md:block mt-4 w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                </div>
            </div>
            @else
            <div class="text-center h-48 mt-20"> Sorry no post found in this category</div>
            @endif
        </div>
    </section>

</x-frontend>