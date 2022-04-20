<x-frontend>
    <x-slot name="title">
        Post Details
    </x-slot>

    
    <section class="mt-4 md:mt-10 ">
        @if($post)
        <div class="container mx-auto px-2 lg:px-6 mb-10 " >
            <h6 class="px-2 text-blue-700 font-bold text-md md:text-xl"></h6>
            <div class="grid grid-cols-1 md:grid-cols-4">
                <!-- ... -->
                <div class="md:col-span-3 px-2 md:mr-4">
                    <h6 class="font-poppin py-4 md:py-6 text-gray-800 font-semibold text-xl md:text-4xl">
                        {{$post->title}}
                    </h6>
                    <p class="mb-4 text-sm text-gray-600 tracking-wide  mt-4">
                    <i class="fa fa-user"></i> <span class="font-semibold">{{$post->user->first_name.' '.$post->user->last_name}}</span> &bull; {{$post->created_at->diffForHumans()}}
                    </p>
                    <div class="mb-4 md:mb-6">
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                        <!-- Your share button code -->
                        <div class="fb-share-button" 
                            data-href="{{env('APP_URL')}}" 
                            data-layout="button"
                            size="large">
                        </div>
                        <i class="ml-4 fa fa-eye"></i> {{$post->post_views->count()}}
                    </div>
                    <div class="mb-6 wrapper bg-gray-400 antialiased text-gray-900 " style="border-bottom: 1px solid #9CA3AF">
                        <div>
                            <img src="{{$post->image}}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">      
                        </div>
                    </div>
                    <div class="mb-8">
                        {!! $post->description !!}
                    </div>
                    <hr >
                    <div class="mt-8" >
                        
                    @if($related_posts->count() > 0)
                       <h6 class="mb-4 font-bold text-lg md:text-xl">Recommended</h6>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 " >  
                            @foreach($related_posts as $related_post)
                            <div class="border-b border-gray-200 md:border-none">
                                <div class="bg-white ">
                                    <a href="{{route('post.details', $related_post->slug)}}">
                                        <img class="w-full h-48" src="{{asset($related_post->image)}}" alt="Mountain">
                                    </a>
                                    <div class="px-3 mt-2">
                                        <a href="{{route('post.details', $related_post->slug)}}">
                                            <div class="md:h-28 text-gray-800 font-bold text-md mb-2">
                                                {{$related_post->title}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                        @endif 
                        
                    </div>
                    @if($post->comments->count() > 0)
                    <div class="mt-8" id="comment-heading">
                        <span class="py-6 px-4 pt-3 pb-2 font-bold text-md md:text-2xl" >Comments</span>
                        <a href="#"><span class="float-right py-6 px-4 pt-3 pb-2  font-bold text-md md:text-2xl -mt-3 md:-mt-4" id="comment">Add Comment</span></a>
                    </div>
                    <div id="comment-container">
                        @foreach($post->comments as $comment)
                        <div class="card m-2 cursor-pointer border-b border-gray-400 rounded-lg ">
                            <div class="m-3">
                                <h2 class="text-md mb-2 font-bold">
                                    {{$comment->guest_full_name ? $comment->guest_full_name : $comment->user->first_name.' '.$comment->user->last_name}}
                                <span class="text-sm font-normal text-teal-800 bg-teal-100 inline rounded-full px-2  float-right md:float-none ">Jan 2020</span>
                                </h2>
                                <p class="text-md text-gray-700 hover:text-gray-900 transition-all duration-200">
                                {{$comment->content}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    

                    <!-- comment form -->
                    <div class="items-center justify-center mt-8  mb-4 max-w-lg" id="commentForm">
                        <form  id="comment" method="post" action="{{route('comment.add')}}" class="comment w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class=" pt-3 pb-2 font-bold text-md md:text-2xl">New comment</h2>
                                @if(!Auth()->check())
                                <div class="w-full md:w-full mb-2 mt-2">
                                    <div class="mb-2 mt-2 font-semibold">
                                        Post as Guest or 
                                        <a class="text-blue-700" href="{{url('login')}}">Login</a>
                                    </div>
                                    <input type='text' class=" rounded border border-gray-400 leading-normal resize-none w-full px-3 font-medium placeholder-gray-700 focus:bg-white  focus:ring-0"  name="guest_full_name"  placeholder='Name' required>
                                </div>
                                @endif
                               
                                <div class="w-full md:w-full mb-2 mt-2">
                                    <textarea class=" rounded border border-gray-400 leading-normal resize-none w-full h-32 py-4 px-3 font-medium placeholder-gray-700 focus:ring-0 focus:bg-white" name="content" placeholder='Type Your Comment' required></textarea>
                                </div>
                                <input type="hidden"  name="id" value="{{$post->id}}">
                                <div class="w-full flex items-start md:w-full">
                                    <div class="">
                                    <button id="button" type='submit' class="bg-blue-600 text-white font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 " >Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="px-2 w-full">
                    <div class="mb-6">
                        <h6 class="mb-4  font-bold text-lg md:text-xl">Trending</h6>
                        <div class="border border-gray-200 -mt-2"></div>
                        <div class="mt-4 bg-white divide-y divide-gray-200">
                        @foreach ($trending_posts as $trending_post)
                        <a href="{{route('post.details',$trending_post->slug)}}">
                            <p class="py-3 font-semibold">{{$trending_post->title}}</p>
                        </a>
                        @endforeach
                    </div>
                       
                    </div>
                    <img style="" class="mt-4 w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                    <img style="" class="hidden md:block mt-4 w-full h-96" src="{{asset('/frontend/image/advert.png')}}" alt="advert">
                </div>
            </div>
        </div>
        @else
        <div class="text-center h-48 mt-20"> Sorry the post you are looking for is no more available</div>
        @endif
    </section>
    @push('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    @endpush
    @push('scripts')
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script>
    
    $('.comment').submit(function(event) {
        event.preventDefault();
      
	    $.ajaxSetup({
			headers:{
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
	    });

        $('#button').html('Sending...');
	    var formValues = $(this).serialize();
        console.log(formValues)
                 
	    $.ajax({
		    type: "POST",
		    url: "{{URL::to('add-comment')}}",
		    data:formValues,
		    success: function (response) {
				$('.comment').trigger('reset');
				toastr.success(response.message);
                console.log(response)
                $('#button').html('Post Comment');

                let parentDiv = document.getElementById("comment-container")

                let div1 = document.createElement("div")
                let div2 = document.createElement("div")
                let h2 = document.createElement("h2")
                let span = document.createElement("span")
                let p = document.createElement("p");
                div1.classList.add("card", "m-2", "cursor-pointer", "border-b", "border-gray-400", "rounded-lg");
                div2.classList.add("m-3");
                span.classList.add("text-sm", "font-normal", "text-teal-800", "ml-2", "bg-teal-100" ,"inline", "rounded-full", "px-2", "float-right", "md:float-none");
                h2.classList.add("text-md", "mb-2", "font-bold");
                p.classList.add("text-md", "text-gray-700", "hover:text-gray-900", "transition-all" ,"duration-200");

                h2.textContent = response.name
               
                span.textContent = response.date
                
                p.textContent = response.content
                
                h2.appendChild(span)
                div2.appendChild(h2)
                div2.appendChild(p)
                div1.appendChild(div2)
                parentDiv.prepend(div1)

                $('html,body').animate({
                    scrollTop: $("#comment-heading").offset().top
                }, 'slow');
               
            }
		});
    });

    function goToByScroll() {
        // Scroll
        $('html,body').animate({
            scrollTop: $("#commentForm").offset().top
        }, 'slow');
    }

    $("#comment").click(function(e) {
        // Prevent a page reload when a link is pressed
        e.preventDefault();
        // Call the scroll function
        goToByScroll();
    });
    </script>
    @endpush
</x-frontend>