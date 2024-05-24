<script>
    // make the text scroll to the right automatically and looping
    var textSlider = document.querySelector('.text-slider');
    var textSliderWidth = textSlider.offsetWidth;
    var textSliderParentWidth = textSlider.parentElement.offsetWidth;
    var textSliderLeft = 0;
    var textSliderSpeed = 1;

    function textSliderMove() {
        textSliderLeft -= textSliderSpeed;
        if (textSliderLeft < -textSliderWidth) {
            textSliderLeft = textSliderParentWidth;
        }
        textSlider.style.left = textSliderLeft + 'px';
    }

    setInterval(textSliderMove, 30);
</script>
