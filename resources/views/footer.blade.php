

        <div  class="p-3 " style="border-top: black solid 1px;"  >
            <div class="row">
                <div class="col-md-3">

                        <section class=" ">
                            <a class="  " href="{{route('home')}}" >
                                <img class="mb-1 w-25"  src="{{asset('assets/image/download-removebg-preview.png')}}" >
                            </a>
                            <h2 class="mx-5 "><span> About Us</span></h2>
            <p>At SkinCare, we create clean, effective skincare made with natural ingredients and backed by science.</p>

                        </section>
                    </div>

                <div class="col-md-4 " style="margin-left: 80px;">
                    <h2 class=" "><span> Links</span></h2>
                    <ul class=" m-0" >
                        <li>
                            <a class=" text-decoration-none mb-3 text-dark " href="{{route('home')}}" >Home </a>
                        </li>
                        <li>
                            <a class=" text-decoration-none mb-3 text-dark " href="{{route('product')}}" >Product </a>
                        </li>
                        <li>
                            <a class=" text-decoration-none mb-3 text-dark " href="{{route('contact')}}" >Contact Us </a>
                        </li>
                    </ul>
                    <br>

                    <h2 class=" "><span>Social Links</span></h2>
                    <ul class=" m-0" >
                        <a  href="https://www.facebook.com" class="fa fa-facebook text-decoration-none mx-2" aria-hidden="true"></a>

                        <a  href="https://www.linkedin.com" class="fa fa-linkedin-square text-decoration-none  mx-2" aria-hidden="true"></a>

                        <a  href="https://x" class="fa fa-twitter text-decoration-none  mx-2" aria-hidden="true"></a>
                    </ul>
                </div>

                <div class="col-md-3" style="margin-left: -120px;">
                        <h2 class=""><span>CONTACT INFO</span></h2>
                        <ul class="">
                            <li class="">
                                <span class="hl">Address:</span>
                                <span class="text">
                                            <strong>EEC Tower </strong> <br>
                                          19 Markaz El Maalomat St., Sheraton Heliopolis, Cairo, Egypt. </span>
                            </li>
                            <li class="phone ">
                                <span class="hl">Phone:</span>
                                <span class="text">
                                +(202) 22 66 9002
                            </span>
                            </li>
                            <li class="phone ">
                                <span class="hl">Fax:</span>
                                <span class="text">
                                +(202) 22 67 9151
                            </span>
                            </li>
                            <li class="email ">
                                <span class="hl">E-mail:</span>
                                <span class="text">
                                info@eecegypt.com
                            </span>
                            </li>
                        </ul>

                </div>




                <div class="col-2 px-4">
                    <form action="{{route('massage')}}" method="POST">
                        @csrf
                        <label for="phone"></label>

                        <input type="text" class="form-control " id="massage" name="massage" placeholder=" Enter Your Massage" >
                        <input class=" btn btn-secondary mt-2 w-75" type="submit" value="Submit">

                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>






