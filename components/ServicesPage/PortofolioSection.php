<div class="portofolio--section">
    <div class="top--content">
        <div class="lefttop-content">
            <p class="orange--heading">Portofolio</p>
            <h2 class="heading">Amazing project we’ve done before</h2>
        </div>
        <div class="leftbottom-content">
            <img src="./images/servicesimages/siska-kohl.png" alt="">
            <div class="info--card">
                <h4>Siska Kohl’s Bedroom</h4>
                <p>We start renovating her bedroom with minimalist concept and using combination white and wooden material</p>
                <a href="">See Detail</a>
            </div>
        </div>
    </div>
    <div class="portofolio--left--content">
        <div class="portofolio--cards">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non.</p>            
            <a href="#">View Portofolio</a>
        </div>
        <div class="portofolio--right--cards">
            <div class="latest-portofolio">
                <img src="./images/servicesimages/Jeruk-Veldevana.png" alt="">
                <div class="info--card">
                    <h4>Jeruk Veldevana Living Room Design</h4>
                    <p>We start renovating her bedroom with minimalist concept and using combination white and wooden material</p>
                    <a href="">See Detail</a>
                </div>
            </div>
            <div class="latest-portofolio">
                <img src="./images/servicesimages/coozy-co.png" alt="">
                <div class="info--card">
                    <h4>Cozy Co-working space</h4>
                    <p>We start renovating her bedroom with minimalist concept and using combination white and wooden material</p>
                    <a href="">See Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .portofolio--section{
        padding: 100px;
        display: grid;
        grid-template-columns: 40% 56.5%;
        gap: 50px;
    }
    .portofolio--section .top--content{
        display: flex;
        flex-direction: column;
        gap: 50px;
        padding-bottom: 0;
    }
    .portofolio--section .top--content .leftbottom-content{
        width: 100%;
        position: relative;
    }
    .portofolio--section .top--content .leftbottom-content img{
        width: 100%;
    }
    .portofolio--section .top--content .leftbottom-content .info--card{
        position: absolute;
        bottom: 0;
        margin: 40px;
        color: #fff;
    }
    .portofolio--section .top--content .leftbottom-content .info--card h4{
        font-size: 26px;
        font-weight: 600;
        line-height: 33.8px;
    }
    .portofolio--section .top--content .leftbottom-content .info--card p{
        font-size: 18px;
        font-weight: 500;
        line-height: 33.8px;
        color: #FFFFFF;
    }
    .portofolio--section .top--content .leftbottom-content .info--card a{
        font-size: 18px;
        font-weight: 500;
        line-height: 33.8px;
        color: #FFFFFF;
        text-decoration: none;
    }
    .portofolio--left--content{
        display: flex;
        width: 100%;
        flex-direction: column;
        gap: 50px;
    }
    .portofolio--left--content .portofolio--cards{
        padding-left: 16em;
    }
    .portofolio--left--content .portofolio--cards p{
        font-size: 18px;
        font-weight: 500;
        line-height: 33.8px;
        color: #AFADB5;
        padding-top: 3em;
    }
    .portofolio--left--content .portofolio--cards a{
        font-size: 18px;
        font-weight: 500;
        line-height: 23.4px;
        color: #518581;
        text-decoration: none;
    }
    .portofolio--right--cards{
        width: 100%;
        position: relative;
        display: flex;
        gap: 22px;
        flex-direction: column;
    }
    .latest-portofolio, .latest-portofolio img{
        width: 100%;
        padding-top: 3px;
        position: relative;
    }
    .portofolio--right--cards .latest-portofolio .info--card{
        position: absolute;
        bottom: 0;
        margin: 40px;
        color: #fff;
    }
    .portofolio--right--cards .latest-portofolio .info--card h4{
        font-size: 26px;
        font-weight: 600;
        line-height: 33.8px;
    }
    .portofolio--right--cards .latest-portofolio .info--card p{
        font-size: 18px;
        font-weight: 500;
        line-height: 33.8px;
        color: #FFFFFF;
    }
    .portofolio--right--cards .latest-portofolio .info--card a{
        font-size: 18px;
        font-weight: 500;
        line-height: 33.8px;
        color: #FFFFFF;
        text-decoration: none;
    }
    @media screen and (max-width: 768px){
        .portofolio--section{
            padding: 50px 20px;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }    
        .portofolio--left--content .portofolio--cards{
            padding-left: 0;
        }
        .portofolio--section .top--content .leftbottom-content .info--card{
            margin: 20px;
        }
        .portofolio--section .top--content .leftbottom-content .info--card h4, .portofolio--right--cards .latest-portofolio .info--card h4{
            font-size: 14px;
            line-height: 24px;
        }
        .portofolio--section .top--content .leftbottom-content .info--card p, .portofolio--right--cards .latest-portofolio .info--card a, .portofolio--right--cards .latest-portofolio .info--card p, .portofolio--right--cards .latest-portofolio .info--card a{
            font-size: 14px;
            line-height: 22px;
        }
        .latest-portofolio img{
            height: 400px;
        }
        .portofolio--right--cards .latest-portofolio .info--card{
            margin: 20px;
        }
    }
</style>