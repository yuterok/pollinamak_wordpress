
Fancybox.bind('[data-fancybox="gallery"]', {
    Toolbar: {
      display: {
        left: [],
        middle: [],
        right: [
          "thumbs",
          "close",
        ],
      }
    },
    Thumbs: {
        showOnStart: false,
      }
  });


  let langMenu = document.getElementById('lang_menu');
  let langBtn = document.getElementById('langBtn');

  document.addEventListener("click", function () {
    document.getElementById('lang_menu').style.opacity = 0;
    document.getElementById('lang_menu').style.visibility = 'hidden';
}, false);
langBtn.addEventListener("click", function (ev) {
  document.getElementById('lang_menu').style.opacity = 1;
  document.getElementById('lang_menu').style.visibility = 'visible';
    ev.stopPropagation(); 
}, false);


var swiperDesktop = new Swiper(".swiperDesktop", {
  slidesPerView: 5.5,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiperLaptop = new Swiper(".swiperLaptop", {
  slidesPerView: 4.5,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiperTablet = new Swiper(".swiperTablet", {
  slidesPerView: 2.5,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiperMobile = new Swiper(".swiperMobile", {
  slidesPerView: 1.1,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


document.querySelector('.burger').addEventListener('click', function(){
  this.classList.toggle('active');
  document.querySelector('.nav_mobile').classList.toggle('open');
  document.body.classList.toggle('no_scroll');
})

if(innerWidth < 825){
  document.querySelector('.about_image_2').setAttribute('data-wow-offset', 300)
}

if(innerWidth < 825){
  document.querySelector('.about_frame').setAttribute('data-wow-offset', 200)
}
if(innerWidth < 825){
  document.querySelector('.process_photos_container').setAttribute('data-wow-offset', 100)
}



// маска для номера телефона

// var phoneInput = document.getElementById('phone');
// var myForm = document.forms.myForm;
// var result = document.getElementById('result');  // only for debugging purposes

// phoneInput.addEventListener('input', function (e) {
//   var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
//   e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
// });

// myForm.addEventListener('submit', function(e) {
//   phoneInput.value = phoneInput.value.replace(/\D/g, '');
//   result.innerText = phoneInput.value;  // only for debugging purposes
  
//   e.preventDefault(); // You wouldn't prevent it
// });

