<div class="testimonial--section">
    <p class="orange--heading">Testimonials</p>
    <h2 class="heading">What our customer say</h2>
    <p class="w-60 para pt-3 m-auto">Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
        nisi,
        adipiscing mauris non purus parturient.</p>
    <div class="testimonial--slider">
        <div class="testimonial--card">
            <img src="./images/quote-up.png" alt="quote-images">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris
                non. </p>
            <div class="testimonial--info">
                <div class="author">
                    <img src="./images/Janne-Cooper.png" alt="">
                    <h4>Janne Cooper</h4>
                </div>
                <div class="rating">
                    <img src="./images/star.png" alt="">
                    <p>4.3</p>
                </div>
            </div>
        </div>
        <div class="testimonial--card">
            <img src="./images/quote-up.png" alt="">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris
                non. </p>
            <div class="testimonial--info">
                <div class="author">
                    <img src="./images/Janne-Cooper.png" alt="">
                    <h4>Janne Cooper</h4>
                </div>
                <div class="rating">
                    <img src="./images/star.png" alt="">
                    <p>4.3</p>
                </div>
            </div>
        </div>
        <div class="testimonial--card">
            <img src="./images/quote-up.png" alt="">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris
                non. </p>
            <div class="testimonial--info">
                <div class="author">
                    <img src="./images/Janne-Cooper.png" alt="">
                    <h4>Janne Cooper</h4>
                </div>
                <div class="rating">
                    <img src="./images/star.png" alt="">
                    <p>4.3</p>
                </div>
            </div>
        </div>
        <div class="testimonial--card">
            <img src="./images/quote-up.png" alt="">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris
                non. </p>
            <div class="testimonial--info">
                <div class="author">
                    <img src="./images/Janne-Cooper.png" alt="">
                    <h4>Janne Cooper</h4>
                </div>
                <div class="rating">
                    <img src="./images/star.png" alt="">
                    <p>4.3</p>
                </div>
            </div>
        </div>
        <div class="testimonial--card">
            <img src="./images/quote-up.png" alt="">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris
                non. </p>
            <div class="testimonial--info">
                <div class="author">
                    <img src="./images/Janne-Cooper.png" alt="">
                    <h4>Janne Cooper</h4>
                </div>
                <div class="rating">
                    <img src="./images/star.png" alt="">
                    <p>4.3</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .testimonial--section{
        padding: 100px;
        text-align: center;
    }
    .testimonial--slider{
        display: flex;
        /* justify-content: center; */
        align-items: center;
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        gap: 30px;
        padding-top: 50px;
    }
    .testimonial--slider::-webkit-scrollbar {
        display: none;
    }
    .testimonial--slider .testimonial--card{
        box-shadow: 0px 4px 100px 0px #AFADB51A;
        padding: 20px;
        text-align: left;
        width: 464px !important;
        margin-inline: 15px;
    }
    .testimonial--slider .testimonial--card p{
        color: #AFADB5;
        font-size: 18px;
        line-height: 24px;
        font-weight: 400;
        text-wrap: wrap;
    }
    .testimonial--slider .testimonial--card img{
        padding-bottom: 20px;
    }
    .testimonial--info{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }
    .author, .rating{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .testimonial--info .author img, .testimonial--info .rating img{
        padding-bottom: 0;
    }
    .testimonial--info .rating p{
        margin: 0;
        font-size: 18px;
        color: #151411;
        font-weight: 400;
    }
    .testimonial--info .author h4{
        font-size: 20px;
        color: #151411;
        line-height: 26px;
        font-weight: 400;
        margin: 0;
    }
    @media screen and (max-width: 768px){
        .testimonial--section{
            padding: 50px 20px;
        }
        .testimonial--slider .testimonial--card{
            width: 320px !important;
        }
        .testimonial--slider .testimonial--card p, .testimonial--info .author h4{
            font-size: 14px;
            line-height: 25.2px;
        }
        .testimonial--info .author img{
            width: 30px;
            height: 30px;
        }
    }
</style>