<div class="mission--section">
    <div class="top--content">
        <div class="lefttop-content">
            <p class="orange--heading">Our Mission</p>
            <h2 class="heading">Our team dedicated to help find  smart home product</h2>
        </div>
        <div class="leftbottom-content">
            <div class="num">
                <h3>20+</h3>
                <p>Years Experience</p>
            </div>
            <div class="num">
                <h3>483</h3>
                <p>Happy Client</p>
            </div>
            <div class="num">
                <h3>150+</h3>
                <p>Project Finished</p>
            </div>
        </div>
    </div>
    <div class="mission--left--content">
        <div class="aboutus">
            <img src="./images/aboutimages/call-received.png" alt="">
            <div>
                <h4>24/7 Supports</h4>
                <p>24/7 support means a support service that is provided 24 hours a day and 7 days a week. </p>
            </div>
        </div>
        <div class="aboutus">
            <img src="./images/aboutimages/messages.png" alt="">
            <div>
                <h4>Free Consultation</h4>
                <p>A free consultation is a one-on-one interaction or conversation given freely to share one's thoughts and discuss possible </p>
            </div>
        </div>
        <div class="aboutus">
            <img src="./images/aboutimages/award.png" alt="">
            <div>
                <h4>Overall Guarantee</h4>
                <p>The comprehensive guarantee is required for import, warehousing, transit, processing and specific use. </p>
            </div>
        </div>
    </div>
</div>
<style>
    .mission--section{
        padding: 100px;
        display: grid;
        grid-template-columns: 40% 50%;
        gap: 150px;
    }
    .mission--section .top--content{
        display: flex;
        flex-direction: column;
        gap: 50px;
        padding-bottom: 0;
    }
    .mission--section .top--content .leftbottom-content{
        width: 100%;
        position: relative;
        display: flex;
        justify-content: space-between;
    }
    .num h3{
        font-weight: 600;
        font-size: 44px;
        line-height: 57.2px;
        color: #151411;
    }
    .num p{
        font-weight: 400;
        font-size: 18px;
        line-height: 32.4px;
        color: #AFADB5;
    }
    .mission--left--content{
        display: flex;
        width: 100%;
        flex-direction: column;
        gap: 20px;
        padding-top: 50px;
    }
    .mission--left--content .aboutus{
        display: flex;
        align-items: self-start;
        gap: 30px;
    }
    .mission--left--content .aboutus img{
        padding: 15px;
        background: #F9F9F9;
        border-radius: 50%;
    }
    .mission--left--content .aboutus div h4{
        font-weight: 600;
        font-size: 26px;
        line-height: 33.2px;
        color: #151411;
    }
    .mission--left--content .aboutus div p{
        font-weight: 400;
        font-size: 18px;
        line-height: 32.4px;
        color: #AFADB5;
    }
    @media screen and (max-width: 768px){
        .mission--section{
            padding: 50px 20px;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }    
        .mission--left--content{
            padding-top: 10px;
        }
        .num h3{
            font-size: 24px;
            line-height: 31.2px;
        }
        .num p{
            font-size: 14px;
            line-height: 24px;
        }
        .mission--left--content .aboutus, .mission--section .top--content{
            gap: 20px;
        }
        .mission--left--content .aboutus div h4{
            font-size: 16px;
            line-height: 20.2px;
        }
        .mission--left--content .aboutus div p{
            font-size: 14px;
            line-height: 24px;
        }
    }
</style>