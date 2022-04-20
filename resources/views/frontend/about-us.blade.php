<x-frontend>
    <x-slot name="title">
        Post List
    </x-slot>
    <div class="container mx-auto px-32 mt-16 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
                <div>
                    <h6 class="-mt-3 mb-4 text-pink-600 font-bold text-xl md:text-2xl">About us</h6>
                    <p class="mb-4">Welcome to Shola Blog, your most visited online platform that delivers latest music,Videos, and music related content around the world. It’s  basically concerned with promotion and distribution of good music around the world.Our platform is easy to access from any browser and country around the world.</p>
                    <p>For Advertisement, Email us : <strong>info@sholablog.com</strong></p>
                </div>
            </div>
            <div>
                <h6 class="-mt-3 mb-4 text-pink-600 font-bold text-xl md:text-2xl">Trending</h6>
                <div class="border border-gray-200 -mt-3"></div>
                <div class="bg-white divide-y divide-gray-200">
                    @foreach ($trending_posts as $trending_post)
                    <div>
                        <a href="{{route('post.details',$trending_post->slug)}}">
                            <p class="py-3 font-semibold">{{$trending_post->title}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@push('css')

@endpush
</x-frontend>