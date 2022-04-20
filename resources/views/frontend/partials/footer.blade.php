<footer class="bg-gray-900 mt-4 md:mt-6">
    <div class="container mx-auto px-2 md:px-20">
        <div class="pt-8 md:pt-20  text-center">
            <form action="">
                <div class="grid md:grid-cols-3 grid-cols-1 gap-4 flex justify-center items-center">
                    <div class="md:ml-auto md:mb-6">
                        <p class="text-gray-300">
                            <strong>Sign up for our newsletter</strong>
                        </p>
                     </div>
                    <div class="md:mb-6">
                        <input
                            type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            "
                            id="exampleFormControlInput1"
                            placeholder="Email address"
                            />
                    </div>
                    <div class="md:mr-auto mb-6">
                        <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Subscribe</button>
                   </div>
                </div>
            </form>
        </div>
        <div class="text-gray-300 grid md:grid-cols-2 gird-cols-1 ">
            <div class="mb-4">
                <div class="flex gap-4  justify-center  md:justify-start">
                    <div class="">
                        <a class="text-lg text-decoration-none" href="{{url('/')}}">Home</a>
                    </div>
                    <div class="">
                        <a class="text-lg text-decoration-none" href="{{url('/about-us')}}">About</a>
                    </div>
                    <div class="">
                        <a class="text-lg text-decoration-none" href="{{url('/contact')}}">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="text-center mb-4">
                <div class="md:float-right text-gray-300">        
                    <i class="mr-6 fa fa-facebook fa-lg"></i>
                    <i class="mr-6 fa fa-instagram fa-lg"></i>
                    <i class="mr-6 fa fa-twitter fa-lg"></i>
                    <i class="mr-6 fa fa-linkedin fa-lg"></i> 
                </div> 
            </div>
        </div>
        <div class="text-center text-gray-200 p-4" >
            © 2022 All Right Reserved
            
        </div>
    </div>
</footer>