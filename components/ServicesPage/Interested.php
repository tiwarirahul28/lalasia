<div class="services--interested">
    <div class="interested-text">
        <h2>Are you interested <br>work with us?</h2>
        <a href="">Let’s Talk</a>
    </div>
</div>
<style>
    .services--interested{
        padding: 50px 100px;
    }
    .services--interested .interested-text{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .services--interested .interested-text h2{
        font-size: 44px;
        line-height: 57.2px;
        font-weight: 600;
        color: #151411;
    }
    .services--interested .interested-text a{
        font-size: 18px;
        line-height: 23px;
        font-weight: 600;
        color: #fff;
        background-color: #518581;
        padding: 15px 40px;
        text-decoration: none;
    }
    @media screen and (max-width: 768px){
        .services--interested{
            padding: 0px 20px;
        }
        .services--interested .interested-text{
            flex-direction: column;
            align-items: self-start;
            gap: 20px;
        }
        .services--interested .interested-text h2{
            font-size: 24px;
            line-height: 31.2px;
        }
        .services--interested .interested-text a{
            font-size: 14px;
            line-height: 23px;
            padding: 15px 40px;
            width: unset;
        }
    }
</style>