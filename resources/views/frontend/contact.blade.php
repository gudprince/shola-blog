<x-frontend>
	<x-slot name="title">
			Post Details
	</x-slot>
	
	<div class="container py-6 md:py-10 mx-auto md:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div  class="px-4 lg:px-8 order-first md:order-last">
                <h6 class=" md:mb-4 font-bold text-2xl md:text-4xl">
                Advertise on World ’s No. 1 Music & Entertainment Platform
                </h6>
                <p>We’ve got the traffic to keep you ahead of your competitors. With our experience, we know what works & what doesn’t work for different clients.</p>
                <div class="mt-10 mb-4 font-bold text-xl md:text-2xl">
                    <i class="  fa fa-envelope"></i>
                    <span>support@sholablog.com</span>
                </div>
                <div class="font-bold text-xl md:text-2xl">
                    <i class=" fa fa-phone"></i>
                    <span class="">+2348161155633</span>
                </div>
            </div>
            <div>
                <div class="">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white">
                            <h6 class="-mt-3 mb-4  font-bold text-xl md:text-2xl">Contact us</h6>
                                <form method="POST" action="{{route('contact')}}" class="contact">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Full Name</span></label></br>
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full " name="name" id="title" value="" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Email</label></br>
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="email" id="description"  required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Subject</label></br>
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="subject" id="description" required >
                                    </div>

                                    <div class="mb-8">
                                        <label class="text-xl text-gray-600">Message</label></br>
                                        <div class="w-full md:w-full mb-2 mt-2">
                                            <textarea class="border-2 border-gray-300 leading-normal resize-none w-full h-32 py-4 px-3 font-medium placeholder-gray-700 focus:ring-0 focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                                        </div>
                                    </div>

                                    <div class="">
                                        <button type="submit" class="px-6 p-3 bg-black text-white hover:bg-blue-400" id="button" required>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@push('css')
<style type="text/css">
		
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none; 
		margin: 0; 
		}
	</style>
@endpush
</x-frontend>
