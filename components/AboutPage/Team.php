<div class="team">
    <div class="team--section">
        <div class="team-left">
            <h1 class="orange--heading">Our Team</h1>
            <h2 class="heading">Meet our leading and strong team</h2>
        </div>
        <div class="team-right">
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non purus parturient.</p>
        </div>
    </div>
    <div class="team-container">
        <div class="team-card">
            <img src="./images/aboutimages/jesse.png" alt="">
            <h2>Jesse Depp</h2>
            <p>Founder & CEO</p>
        </div>
        <div class="team-card">
            <img src="./images/aboutimages/carter.png" alt="">
            <h2>Margareth Carter</h2>
            <p>COO</p>
        </div>
        <div class="team-card">
            <img src="./images/aboutimages/andrew.png" alt="">
            <h2>Andrew Taggart</h2>
            <p>Developer</p>
        </div>
        <div class="team-card">
            <img src="./images/aboutimages/grace.png" alt="">
            <h2>Grace Marie</h2>
            <p>Manager</p>
        </div>
        <div class="team-card">
            <img src="./images/aboutimages/jesse-depp.png" alt="">
            <h2>Manish</h2>
            <p>Senior Designer</p>
        </div>
        <div class="team-card">
            <img src="./images/aboutimages/depp.png" alt="">
            <h2>Divanshu</h2>
            <p>Marketer</p>
        </div>
    </div>
</div>
<style>
    .team{
        padding: 100px;
    }
    .team .team--section{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .team .team--section .team-right p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 500;
        color: #AFADB5;
        padding-left: 24em;
    }
    .team-container{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 50px;
        padding-top: 50px;
    }
    .team-container .team-card{
        width: 100%;
        height: 100%;
    }
    .team-container .team-card img{
        width: 100%;
    }
    .team-container .team-card h2{
        font-size: 26px;
        line-height: 32.4px;
        font-weight: 600;
        color: #151411;
        padding: 15px 0 5px;
        margin-bottom: 0;
    }
    .team-container .team-card p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 500;
        color: #AFADB5;
    }
    @media screen and (max-width: 768px) {
        .team{
            padding: 50px 20px;
        }
        .team .team--section{
            flex-direction: column;
        }
        .team .team--section .team-right p{
            padding-left: 0;
            font-size: 14px;
            line-height: 25.2px;
            padding-top: 10px;
        }
        .team-container{
            padding-top: 20px;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .team-container .team-card h2{
            font-size: 14px;
            line-height: 18px;
        }
        .team-container .team-card p{
            font-size: 12px;
            line-height: 18px;
        }
    }
</style>