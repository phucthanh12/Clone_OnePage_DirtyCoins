
        /* Slide Banner Start */
        var slideIndex = 0;
        showSlideImg();

        function showSlideImg() { 
            var i;
            var slides = document.getElementsByClassName("bannerSlide");
            var dots = document.getElementsByClassName("dot");
            
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1};
             
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active","");
            }

            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className +=" active";
            setTimeout(showSlideImg,2000);
        }
        /* Slide Banner End */

        /* show Row */
        var moreRow = document.getElementsByClassName("row");
        var showMore = document.getElementsByClassName("btn-recommend");
        var outofIndex = document.getElementsByClassName("btn-outofIndex");
        function showMoreProducts () {
            moreRow[2].className = moreRow[2].className.replace(" row-hide","");
            showMore[0].style.display = "none";
            outofIndex[0].style.display = "inline-block";
        }
