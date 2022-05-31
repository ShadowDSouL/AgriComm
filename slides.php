<style>
html,body {
  position: relative;
  height: 100%;
}

body {
  background: #eee;
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}

.swiper {
  width: 70%;
  height: 45%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cove
}

      
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>About Us Slides</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <
  </head>

  <body>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/ggeghergwr_1509106840.webp" alt="img1"></div>
        <div class="swiper-slide"><img src="img/img1.jpg" alt="img2"></div>
        <div class="swiper-slide"><img src="img/img2.jpg" alt="img3"></div>
        <div class="swiper-slide"><img src="img/img3.png" alt="img4"></div>
        <div class="swiper-slide"><img src="img/img4.jpg" alt="img5"></div>
        <div class="swiper-slide"><img src="img/img5.jpg" alt="img6"></div>
        <div class="swiper-slide"><img src="img/istockphoto-540238898-170667a.jpg" alt="img7"></div>
        <div class="swiper-slide"><img src="img/impact-of-climate-change.jpg" alt="img8"></div>
        <div class="swiper-slide"><img src="img/joao-marcelo-marques-Qp0lt8ehfjg-unsplash.jpg" alt="img9"></div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
  </body>
</html>
