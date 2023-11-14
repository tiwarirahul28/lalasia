<div class="article-page-section">
    <div class="content">
        <h1 class="content--heading">Article</h1>
        <p class="content--paragraph">We display products based on the latest products we have, if you want to see our old products please enter the name of the item</p>
    </div>
</div>
<div class="article--page--slider--section">
    <div class="article-page-sliders">
        <div class="article-page-slider--card">
            <img src="./images/productimages/product--slider.webp" alt="">
            <div class="article-page-content--info">
                <span>Tips and Trick</span>
                <h2>This 400-Square-Foot New York Apartment Is Maximized With Custom Millwork</h2>
                <div class="author">
                    <div class="author-info">
                        <img src="./images/Janne-Cooper.png" alt="">
                        <h3>By Morgan Goldberg</h3>
                    </div>
                    <div class="date">
                        <p>Tuesday, 17 May 2022</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="article-page-slider--card">
            <img src="./images/productimages/product-slider-two.webp" alt="">
            <div class="article-page-content--info">
                <span>Tips and Trick</span>
                <h2>This 400-Square-Foot New York Apartment Is Maximized With Custom Millwork</h2>
                <div class="author">
                    <div class="author-info">
                        <img src="./images/Janne-Cooper.png" alt="">
                        <h3>By Morgan Goldberg</h3>
                    </div>
                    <div class="date">
                        <p>Tuesday, 17 May 2022</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="article-page-slider--card">
            <img src="./images/productimages/RamadhanSaleOffer.png" alt="">
            <div class="article-page-content--info">
                <span>Tips and Trick</span>
                <h2>This 400-Square-Foot New York Apartment Is Maximized With Custom Millwork</h2>
                <div class="author">
                    <div class="author-info">
                        <img src="./images/Janne-Cooper.png" alt="">
                        <h3>By Morgan Goldberg</h3>
                    </div>
                    <div class="date">
                        <p>Tuesday, 17 May 2022</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="article-page-slider--card">
            <img src="./images/productimages/product--slider.webp" alt="">
            <div class="article-page-content--info">
                <span>Tips and Trick</span>
                <h2>This 400-Square-Foot New York Apartment Is Maximized With Custom Millwork</h2>
                <div class="author">
                    <div class="author-info">
                        <img src="./images/Janne-Cooper.png" alt="">
                        <h3>By Morgan Goldberg</h3>
                    </div>
                    <div class="date">
                        <p>Tuesday, 17 May 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .article-page-section{
        text-align: center;
        height: 60vh;
        padding-top: 100px;
        display: flex;
        justify-content: center;
        align-items: center
    }
    .article--page--slider--section{
        padding: 0 100px;
        height: 720px;
    }
    .article-page-sliders{
        width: 100%;
        height: 100%;
    }
    .article-page-sliders .article-page-slider--card{
        width: 100%;
        height: 600px;
        position: relative;
    }
    .article-page-sliders .slick-list{
        overflow-x: hidden;
        overflow-y: hidden;
        height: 100%;
    }
    .article-page-sliders .article-page-slider--card img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info{
        position: absolute;
        left: 10%;
        transform: translate(0%);
        background: #fff;
        bottom: -7em;
        width: 80%;
        box-shadow: 0px 4px 140px 0px #AFADB533;
        padding: 40px 30px;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info span{
        font-size: 18px;
        line-height: 44.4px;
        font-weight: 400;
        color: #AFADB5;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info h2{
        font-size: 26px;
        line-height: 44.8px;
        color: #151411;
        font-weight: 600;
        margin-bottom: 0;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info .author{
        gap: 20px;
        margin-top: 1.5em;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info .author .author-info{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info .author .author-info img{
        width: 40px;
        height: 40px;
        object-fit: cover;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info .author .author-info h3{
        font-size: 14px;
        line-height: 18.2px;
        font-weight: 600;
        color: #151411;
        margin-bottom: 0;
    }
    .article-page-sliders .article-page-slider--card .article-page-content--info .author .date p{
        font-size: 14px;
        line-height: 18.4px;
        font-weight: 400;
        color: #AFADB5;
        margin-bottom: 0;
    }
    .article-page-sliders button.slick-prev {
        position: absolute;
        left: 2em;
        top: 44%;
        z-index: 1;
        transform: translateY(-44%);
        color: transparent;
        background-color: #15141199;
        border: none;
        padding: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;
        border-radius: 50%;
    }

    .article-page-sliders button.slick-prev::before {
        content: '' !important;
        position: absolute;
        background-image: url('./images/arrow-left.png');
        background-size: 20px;
        background-repeat: no-repeat;
        left: 25%;
        top: 25%;
        width: 20px;
        height: 20px;
    }

    .article-page-sliders button.slick-next {
        position: absolute;
        right: 2em;
        top: 44%;
        z-index: 1;
        transform: translateY(-44%);
        color: transparent;
        background-color: #15141199;
        border: none;
        padding: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;
        border-radius: 50%;
    }

    .article-page-sliders button.slick-next::before {
        content: '' !important;
        position: absolute;
        background-image: url('./images/arrow-right.png');
        background-size: 20px;
        background-repeat: no-repeat;
        left: 25%;
        top: 25%;
        width: 20px;
        height: 20px;
    }   
    .article-page-sliders .slick-dots{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    .article-page-sliders .slick-dots li{
        margin-inline: 10px;
        cursor: pointer;
    }
    .article-page-sliders .slick-dots li::marker{
        color: #15141199;
        font-size: 30px;
    }
    .article-page-sliders .slick-dots li button{
        color: transparent;
        background: transparent;
        display: none;
        border: none;
    }
    .article-page-sliders .slick-dots .slick-active::marker{
        color: #fff;
    }
    @media screen and (max-width: 768px){
        .article-page-section{
            padding: 100px 20px 0;
            height: 30vh;
        }
        .article--page--slider--section{
            padding: 50px 20px;
            height: 450px;
        }
        .article-page-sliders .article-page-slider--card{
            height: 250px;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info{
            padding: 15px;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info span{
            font-size: 10px;
            line-height: 14.5px;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info h2{
            font-size: 14px;
            line-height: 18.2px;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info .author .author-info h3, .article-page-sliders .article-page-slider--card .article-page-content--info .author .date p{
            font-size: 12px;
            line-height: 16.6px;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info{
            left: 5%;
            width: 90%;
            bottom: -5em;
        }
        .article-page-sliders .article-page-slider--card .article-page-content--info .author{
            gap: 10px;
            margin-top: 1em;
        }
    }
</style>