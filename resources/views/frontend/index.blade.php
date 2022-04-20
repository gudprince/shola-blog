<x-frontend>
    <x-slot name="title">
    Home
    </x-slot>
    @if ($latest_posts->count() > 0)
    <section class="mt-10 md:mt-14 border-b">
        <div class="container-sm  md:px-6 mx-auto mb-10 " >
            
            <div class="grid grid-cols-1 md:grid-cols-4">
                <div class="md:text-center px-6 mb-6">
                    <h6 class="underline underline-offset-8 -mt-3 mb-4  font-bold text-lg md:text-xl">Trending</h6>
                    <div class="bg-white divide-y divide-gray-200">
                        @foreach ($trending_posts as $trending_post)
                        <div class="py-4 bg-white mt-2 grid grid-cols-3 md:grid-cols-1">
                            <div>
                                <div class="md:flex md:flex-wrap md:justify-center">
                                    <div class="">
                                        <a href="{{route('post.details',$trending_post->slug)}}">
                                            <img src="{{$trending_post->image}}" alt="..." class="shadow rounded-full max-w-full h-24 md:h-48 align-middle border-none" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-span-2 md:col-span-1">
                                <a href="{{route('post.details',$trending_post->slug)}}">
                                    <div class="text-gray-700 mt-2 md:mt-3 font-semibold  text-md" >
                                        {{$trending_post->title}}
                                    </div>
                                    <p class="text-sm text-gray-600 tracking-wide  mt-4">
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
                <div class="md:col-span-2 text-blue-800 px-2 md:px-10 order-first md:order-none">
                    @if ($headline_posts->count() > 1)
                    <div  class="mb-6 md:mb-8 wrapper  antialiased " >
                        <div>
                            <a href="{{route('post.details',$headline_posts->first()->slug)}}">
                                <img src=" {{$headline_posts->first()->image}}" alt=" random imgee" class="w-full  h-96 object-cover object-center">      
                            </a>
                            <div class="relative px-4 -mt-14 md:-mt-20  ">
                                <div class="bg-black  p-4 md:p-6 rounded-lg shadow-lg"> 
                                    <a href="{{route('post.details',$headline_posts->first()->slug)}}"> 
                                        <div class="text-white font-semibold text-lg md:text-3xl mb-2 font-poppin">
                                         {{$headline_posts->first()->title}}
                                        </div>
                                        <p class="text-sm text-white tracking-wide  mt-4">
                                            By <span class="font-semibold">{{$headline_posts->first()->user->first_name.' '.$headline_posts->first()->user->last_name}}</span> 
                                            <span class="hidden md:inline-block">&bull; {{$headline_posts->first()->created_at->diffForHumans()}}</span>
                                            <i class="ml-4 fa fa-eye"></i> {{$headline_posts->first()->post_views->count()}}
                                        </p>
                                    </a>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 block rounded-full">
                        <a href="{{route('post.details',$headline_posts->last()->slug)}}">
                            <img src="{{$headline_posts->last()->image}}" alt=" random imgee" class="w-full  h-96 object-cover object-center">      
                        </a>
                        <div class="px-3 py-2 md:py-4">
                            <a href="{{route('post.details',$headline_posts->last()->slug)}}">
                                <div class="text-gray-700 font-semibold text-lg md:text-3xl mb-2 font-poppin">
                                    {{$headline_posts->last()->title}}
                                </div>
                                <p class="text-sm text-gray-600 tracking-wide  mt-4">
                                    By <span class="font-semibold">{{$trending_post->user->first_name.' '.$trending_post->user->last_name}}</span> 
                                    <span class="hidden md:inline-block">&bull; {{$trending_post->created_at->diffForHumans()}}</span>
                                    <i class="ml-4 fa fa-eye"></i> {{$trending_post->post_views->count()}}
                                </p>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="px-2">
                    <h6 class="mb-2 underline underline-offset-8 -mt-3 font-bold text-lg md:text-xl">Featured</h6>
                    <div class="bg-white divide-y divide-gray-200">
                        @foreach ($featured_posts as $featured_post)
                        <p class="py-3 font-semibold">
                            <a href="{{route('post.details',$featured_post->slug)}}">
                            {{$featured_post->title}}
                            </a>
                        </p>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        <img style="" class="w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                    </div> 
                </div>
            </div>
        </div>
    </section>

    
    <section class="mt-4 bg-white">
   
        <div class="container mx-auto px-2 mb-10 " >
            <h6 class="underline underline-offset-8 py-6 font-bold text-lg md:text-2xl">New Post</h6>
            
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
                <!-- ... -->
                <div class="md:col-span-3">
                    <div class="bg-white mt-3  divide-y divide-gray-200">
                        @foreach ($latest_posts as $latest_post)
                        <div class="bg-white mt-2 grid grid-cols-3 md:grid-cols-2">
                            <div>
                                <div class="bg-white py-2 px-1">
                                    <a href="{{route('post.details',$latest_post->slug)}} ">
                                        <img class="w-full h-20 md:h-64" src="{{$latest_post->image}}" alt="Mountain">
                                    </a>
                                </div>
                            </div>
                            <div  class="col-span-2 md:col-span-1">
                                <div class="px-3 py-4 font-poppin">
                                    <a href="{{route('post.details',$latest_post->slug)}}">
                                        <div class="-mt-2 sm:mt-2   text-gray-600 text-sm md:text-lg"></div>
                                        <div class="text-gray-800 font-semibold mb-2 text-sm md:text-2xl">
                                            {{$latest_post->title}}
                                        </div>
                                        <p class="mt-3 text-gray-600 hidden sm:block">
                                        {{$latest_post->sub_title}}
                                        </p>
                                        <p class="text-sm text-gray-600 tracking-wide  mt-4">
                                            By </i> <span class="font-semibold">{{$latest_post->user->first_name.' '.$latest_post->user->last_name}}</span> 
                                            <span class="hidden md:inline-block">&bull; {{$latest_post->created_at->diffForHumans()}}</span>
                                            <i class="ml-4 fa fa-eye"></i> {{$latest_post->post_views->count()}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a class="text-decoration-none" href="{{route('all.posts')}}">
                            <button class="mt-6 md:mt-8 h-10 px-6 font-semibold rounded-md bg-gray-300 w-1/2" type="submit">
                                See More
                            </button>
                        </a>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="md:px-4 mb-6">
                       
                 
                    <img style="" class="w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="text-center" style="">
        <div class=" py-20 md:py-40  text-4xl">
            <h1 class="mt-2">Post and Category is empty</h1>
            <h1 class=" ">Please run php artisan db:seed or add new category and posts</h1>
        </div>
    </section>
    @endif
</x-frontend>