@extends('layouts.frontendmaster')

@section('content')


<!-- main body - start
================================================== -->
<main>

    <!-- sidebar cart - start
    ================================================== -->
    <div class="sidebar-menu-wrapper">
        <div class="cart_sidebar">
            <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
            <ul class="cart_items_list ul_li_block mb_30 clearfix">
                <li>
                    <div class="item_image">
                        <img src="{{ asset('frontend_asset')}}/images/cart/cart_img_1.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">Yellow Blouse</h4>
                        <span class="item_price">$30.00</span>
                    </div>
                    <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                </li>
                <li>
                    <div class="item_image">
                        <img src="{{ asset('frontend_asset') }}/images/cart/cart_img_2.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">Yellow Blouse</h4>
                        <span class="item_price">$30.00</span>
                    </div>
                    <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                </li>
                <li>
                    <div class="item_image">
                        <img src="{{ asset('frontend_asset') }}/images/cart/cart_img_3.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">Yellow Blouse</h4>
                        <span class="item_price">$30.00</span>
                    </div>
                    <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                </li>
            </ul>

            <ul class="total_price ul_li_block mb_30 clearfix">
                <li>
                    <span>Subtotal:</span>
                    <span>$90</span>
                </li>
                <li>
                    <span>Vat 5%:</span>
                    <span>$4.5</span>
                </li>
                <li>
                    <span>Discount 20%:</span>
                    <span>- $18.9</span>
                </li>
                <li>
                    <span>Total:</span>
                    <span>$75.6</span>
                </li>
            </ul>

            <ul class="btns_group ul_li_block clearfix">
                <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
                <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
            </ul>
        </div>

        <div class="cart_overlay"></div>
    </div>
    <!-- sidebar cart - end
    ================================================== -->

    <!-- breadcrumb_section - start
    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{url('/') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->


    <!-- about_section - start
    ================================================== -->
    <section class="about_section section_space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-6 order-last">
                    <div class="about_image">
                        <img src="{{ asset('frontend_asset') }}/images/about/about_image.jpg" alt="image_not_found">
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="about_content">
                        <h2 class="about_small_title text-uppercase">Comnay History</h2>
                        <h3 class="about_title">Electro is a clean, modern, user friendly, responsive</h3>
                        <p>
                            Collaboratively administrate empowered markets via plug-and-play maintain networks. Dynamically usable procrastinate B2B users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.
                        </p>
                        <ul class="counter_wrap ul_li">
                            <li>
                                <span class="counter">12</span>
                                <small>Years Experience</small>
                            </li>
                            <li>
                                <span><strong class="counter">10</strong>K</span>
                                <small>Happy Customers</small>
                            </li>
                            <li>
                                <span><strong class="counter">100</strong>%</span>
                                <small>Clients Satisfaction</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about_section - end
    ================================================== -->


    <!-- service_section - start
    ================================================== -->
    <section class="service_section bg_gray section_space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-lg-4 col-md-6 col-sm-6">
                    <div class="service_boxed">
                        <div class="item_icon">
                            <i class="icon icon-Wrench"></i>
                            <i class="icon icon-Wrench"></i>
                        </div>
                        <h3 class="item_title"> Creative Design </h3>
                        <p> Collaboratively administrate empowered markets via plug-and-play maintain networks revolutionary ROI.</p>
                    </div>
                </div>

                <div class="col col-lg-4 col-md-6 col-sm-6">
                    <div class="service_boxed">
                        <div class="item_icon">
                            <i class="icon icon-Dollars"></i>
                            <i class="icon icon-Dollars"></i>
                        </div>
                        <h3 class="item_title">Money Back Guarantee</h3>
                        <p>Collaboratively administrate empowered markets via plug-and-play maintain networks revolutionary ROI.</p>
                    </div>
                </div>

                <div class="col col-lg-4 col-md-6 col-sm-6">
                    <div class="service_boxed">
                        <div class="item_icon">
                            <i class="icon icon-Phone2"></i>
                            <i class="icon icon-Phone2"></i>
                        </div>
                        <h3 class="item_title">Online Support 24/7</h3>
                        <p>Collaboratively administrate empowered markets via plug-and-play maintain networks revolutionary ROI.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service_section - end
    ================================================== -->


    <!-- team_section - start
    ================================================== -->
    <section class="team_section section_space">
        <div class="container">

            <div class="row">
                <div class="col col-lg-6 col-md-8 col-sm-10">
                    <div class="team_section_title">
                        <h2 class="title_text">Meet Our Team</h2>
                        <p class="mb-0">Collaboratively administrate empowered markets via plug-and-play maintain networks. Dynamically usable procrastinate B2B users</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col col-lg-3 col-md-4 col-sm-6">
                    <div class="team_item">
                        <div class="team_image">
                            <img src="{{ asset('frontend_asset') }}/images/team/team_1.jpg" alt="image_not_found">
                        </div>
                        <div class="team_content">
                            <h3 class="team_member_name">Harry Dor</h3>
                            <span class="team_member_title">CEO/Founder</span>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-3 col-md-4 col-sm-6">
                    <div class="team_item">
                        <div class="team_image">
                            <img src="{{ asset('frontend_asset') }}/images/team/team_2.jpg" alt="image_not_found">
                        </div>
                        <div class="team_content">
                            <h3 class="team_member_name">John Swim</h3>
                            <span class="team_member_title">Fashion Designer</span>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-3 col-md-4 col-sm-6">
                    <div class="team_item">
                        <div class="team_image">
                            <img src="{{ asset('frontend_asset') }}/images/team/team_3.jpg" alt="image_not_found">
                        </div>
                        <div class="team_content">
                            <h3 class="team_member_name">Harry Dor</h3>
                            <span class="team_member_title">CEO/Founder</span>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-3 col-md-4 col-sm-6">
                    <div class="team_item">
                        <div class="team_image">
                            <img src="{{ asset('frontend_asset') }}/images/team/team_4.jpg" alt="image_not_found">
                        </div>
                        <div class="team_content">
                            <h3 class="team_member_name">John Swim</h3>
                            <span class="team_member_title">Fashion Designer</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- team_section - end
    ================================================== -->


    <!-- newsletter_section - start
    ================================================== -->
    <section class="newsletter_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6">
                    <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                    <p>Get E-mail updates about our latest products and special offers.</p>
                </div>
                <div class="col col-lg-6">
                    <form action="#!">
                        <div class="newsletter_form">
                            <input type="email" name="email" placeholder="Enter your email address">
                            <button type="submit" class="btn btn_secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter_section - end
    ================================================== -->

</main>
<!-- main body - end
================================================== -->

@endsection
