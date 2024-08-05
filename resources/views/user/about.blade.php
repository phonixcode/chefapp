@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'About'])

<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__video set-bg">
                    <img src="{{ asset('img/about.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="about__text">
                <div class="section-title">
                    <span>About Culinary Crafts</span>
                </div>
                <p>
                    Welcome to Culinary Crafts, where the passion for food and the art of cooking come together to create unforgettable experiences. Our mission is to bridge the gap between food enthusiasts and world-renowned chefs, fostering a vibrant community that celebrates culinary creativity and excellence.
                </p>

                <div class="section-title">
                    <h2>Our Story</h2>
                </div>                
                <p>
                    Culinary Crafts was born from a deep love for food and a desire to make the culinary world more accessible and interconnected. Our founders, a group of dedicated foodies and tech innovators, saw the need for a platform that not only provides recipes but also offers direct access to culinary experts. Inspired by their own experiences of exploring diverse cuisines and cooking techniques, they envisioned a space where food lovers can learn, share, and connect with professional chefs from around the globe.
                </p>

                <div class="section-title">
                    <h2>What We Offer</h2>
                </div>    

                <p>
                    At Culinary Crafts, we believe that food is more than just sustenance; it’s an experience that brings people together, tells stories, and evokes emotions. Our platform offers a range of features designed to inspire, educate, and unite food enthusiasts everywhere:

Interactive Cooking Classes: Dive into the world of culinary arts with our live and on-demand cooking classes. Led by renowned chefs, these classes offer a hands-on learning experience, complete with Q&A sessions and real-time feedback, ensuring you master each dish with confidence.

Extensive Recipe Library: Discover a treasure trove of recipes from various cuisines, curated by our team of culinary experts. Whether you’re a beginner or an experienced cook, our detailed instructions and video tutorials will guide you through the process of creating delicious meals.

Chef and Foodie Network: Join our dynamic community of food lovers. Connect with local and international chefs, share your culinary adventures, exchange tips, and collaborate on exciting projects. Our social platform is designed to foster meaningful interactions and inspire culinary creativity.

Virtual Culinary Events: Experience the thrill of exclusive virtual cooking demonstrations, food festivals, and tasting events. These events offer unique opportunities to learn from the best, explore new flavors, and celebrate the joy of food with fellow enthusiasts.

Ingredient Marketplace: Access unique and hard-to-find ingredients from trusted suppliers. Our marketplace ensures you have everything you need to elevate your cooking, from specialty spices to gourmet products.

                </p>

                <div class="section-title">
                    <h2>Our Community</h2>
                </div>  

                <p>
                    Culinary Crafts is more than just an app; it’s a community of passionate individuals who share a love for food and cooking. We believe in the power of food to bring people together, create lasting memories, and foster cultural exchange. Our platform is designed to support and nurture this community, providing a space where everyone can grow, learn, and share their culinary journey.
                </p>

                <div class="section-title">
                    <h2>Join Us</h2>
                </div>  

                <p>
                    Whether you’re a seasoned chef, an aspiring home cook, or simply someone who loves good food, Culinary Crafts welcomes you. Join us on this delicious adventure and discover the endless possibilities that the culinary world has to offer. Together, let’s craft something extraordinary.
                </p>
                
            </div>
        </div>
    </div>
</section>

@include('user._include._testimonial')

@include('user._include._chef', ['chefs', $chefs])

@include('user._include._map')
    
@endsection