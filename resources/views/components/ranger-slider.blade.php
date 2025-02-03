<div class="form-group">
    <label for="">Prix</label>

    <div class="price-input-container">
        <div class="price-input">
            <div class="price-field">
                <span>Minimum</span>
                <input type="number" class="min-input" name="min-price" value="2000" min="2000" max="300000" form="shop-search-form">
            </div>
            <div class="price-field">
                <span>Maximum</span>
                <input type="number" class="max-input" name="max-price" value="300000" min="2000" max="300000" form="shop-search-form">
            </div>
        </div>
        <div class="slider-container">
            <div class="price-slider"></div>
        </div>
    </div>

    <!-- Slider -->
    <div class="range-input">
        <input type="range" class="min-range" min="2000" max="300000" value="2000" step="1">
        <input type="range" class="max-range" min="2000" max="300000" value="100000" step="1">
    </div>
</div>

<script>
    const rangeValue = document.querySelector(".slider-container .price-slider");
    const rangeInputValue = document.querySelectorAll(".range-input input");
    const priceInputValue = document.querySelectorAll(".price-input input");

    let priceGap = 1000;

    priceInputValue.forEach((input, i) => {
        input.addEventListener("input", e => {
            let minPrice = Math.max(parseInt(priceInputValue[0].value), 2000);
            let maxPrice = Math.min(parseInt(priceInputValue[1].value), 300000);

            if (maxPrice - minPrice < priceGap) {
                if (i === 0) {
                    minPrice = maxPrice - priceGap;
                } else {
                    maxPrice = minPrice + priceGap;
                }
            }

            priceInputValue[0].value = minPrice;
            priceInputValue[1].value = maxPrice;
            rangeInputValue[0].value = minPrice;
            rangeInputValue[1].value = maxPrice;

            updateSlider(minPrice, maxPrice);
        });
    });

    rangeInputValue.forEach((range, i) => {
        range.addEventListener("input", e => {
            let minVal = parseInt(rangeInputValue[0].value);
            let maxVal = parseInt(rangeInputValue[1].value);

            if (maxVal - minVal < priceGap) {
                if (i === 0) {
                    minVal = maxVal - priceGap;
                } else {
                    maxVal = minVal + priceGap;
                }
            }

            priceInputValue[0].value = minVal;
            priceInputValue[1].value = maxVal;

            updateSlider(minVal, maxVal);
        });
    });

    function updateSlider(min, max) {
        let rangeMax = 300000;
        rangeValue.style.left = `${(min / rangeMax) * 100}%`;
        rangeValue.style.right = `${100 - (max / rangeMax) * 100}%`;
    }
</script>
