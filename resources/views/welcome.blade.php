@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {

                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        @section('content')
            <div class="container">
            <!-- /slider -->
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider4">

						<li>
							<div class="banner-top2">
								<div class="banner-info-wthree">
									<h3 style="color:rgb(251, 56, 59);">Nike</h3>
									<p style="color:rgb(251, 56, 59);">See how good they feel.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top3">
								<div class="banner-info-wthree">
									<h3 style="color:rgb(251, 56, 59);">Heels</h3>
									<p>For All Walks of Life.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top">
								<div class="banner-info-wthree">
									<h3 style="color:rgb(251, 56, 59);">Sneakers</h3>
									<p>See how good they feel.</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top1">
								<div class="banner-info-wthree">
									<h3 style="color:rgb(251, 56, 59);">Adidas</h3>
									<p style="color:rgb(251, 56, 59);">For All Walks of Life.</p>

								</div>

							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //slider -->
			<ul class="top_icons">
				<li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>

			</ul>
		</div>
	</div>
	<!-- //banner -->
	<!-- /girds_bottom-->
	<div class="grids_bottom">
		<div class="style-grids">
			<div class="col-md-6 style-grid style-grid-1">
				<img src="img/market1.jpg" alt="shoe">
			</div>
		</div>
		<div class="col-md-6 style-grid style-grid-2">
			<div class="style-image-1_info">
				<div class="style-grid-2-text_info">
					<h3>Nike DOWNSHIFTER</h3>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
						tempora incidunt ut labore et dolore .</p>
					<div class="shop-button">
						<a href="shop.html">Shop Now</a>
					</div>
				</div>
			</div>
			<div class="style-image-2">
				<img src="img/market2.jpg" alt="shoe">
				<div class="style-grid-2-text">
					<h3>Air force</h3>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	<!-- //grids_bottom-->
	<!-- /girds_bottom2-->
	<div class="grids_sec_2">
		<div class="style-grids_main">
			<div class="col-md-6 grids_sec_2_left">
				<div class="grid_sec_info">
					<div class="style-grid-2-text_info">
						<h3>Sneakers</h3>
						<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
							tempora incidunt ut labore .</p>
						<div class="shop-button">
							<a href="shop.html">Shop Now</a>
						</div>
					</div>
				</div>
				<div class="style-image-2">
					<img src="img/market3.jpg" alt="shoe">
					<div class="style-grid-2-text">
						<h3>Air force</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6 grids_sec_2_left">

				<div class="style-image-2">
					<img src="img/market4.jpg" alt="shoe">
					<div class="style-grid-2-text">
						<h3>Air force</h3>
					</div>
				</div>
				<div class="grid_sec_info last">
					<div class="style-grid-2-text_info">
						<h3>Sneakers</h3>
						<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
							tempora incidunt ut labore .</p>
						<div class="shop-button two">
							<a href="shop.html">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //grids_bottom2-->
	<!-- /Properties -->
	<div class="mid_slider_w3lsagile">
		<div class="col-md-3 mid_slider_text">
			<h5>Some More Shoes</h5>
		</div>
		<div class="col-md-9 mid_slider_info">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1" class=""></li>
					<li data-target="#myCarousel" data-slide-to="2" class=""></li>
					<li data-target="#myCarousel" data-slide-to="3" class=""></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
			<!--
            			<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/shop1.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/shop2.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/shop3.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/shop4.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
						</div>
					</div>
				-->
                	<div class="item">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/fashion1.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/fashion2.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/fashion3.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/fashion4.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/jewels1.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/jewels2.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/jewels3.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 slidering">
								<div class="thumbnail"><img src="img/jewels4.jpg" alt="Image" style="max-width:100%;"></div>
							</div>
						</div>
					</div>
				</div>
			
				<!-- The Modal -->

			</div>
		</div>

		<div class="clearfix"> </div>
	</div>
	<!--//banner -->
				</div>
			</div>
 
            </div>
        @endsection
    </body>
    
</html>
