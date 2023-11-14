<div class="second--section">
    <div class="number--card">
        <h2>01</h2>
        <h3>Furniture</h3>
        <p>At the ultimate smart home, you're met with technology before you even step through the front door. </p>
    </div>
    <div class="number--card">
        <h2>02</h2>
        <h3>Home Decoration</h3>
        <p>Create A Calming Summer Escape With Our Luxurious Home Accessories For The Balmy Evenings.</p>
    </div>
    <div class="number--card">
        <h2>03</h2>
        <h3>Kitchen Cabinet</h3>
        <p>Introducing the modular kitchen cabinet system. Start with our huge selection of base and wall cabinets.</p>
    </div>
    <div class="number--card">
        <h2>04</h2>
        <h3>Interior Design</h3>
        <p>Innovative products often feature innovative designs that play with the patterns we are familiar.</p>
    </div>
    <div class="number--card">
        <h2>05</h2>
        <h3>Exterior Design</h3>
        <p>These stylish and resilient products provide up-to-date options for roofing, siding, decking, and outdoor spaces.</p>
    </div>
    <div class="number--card">
        <h2>06</h2>
        <h3>Custom Furniture</h3>
        <p>With Quality Materials and Modern Designs, we have Designs for all Tastes. we bring you World Class Designs.</p>
    </div>
</div>
<style>
    .second--section{
        padding: 0px 100px 50px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 50px;
    }
    .second--section .number--card{
        width: 100%;
    }
    .second--section .number--card h2{
        font-size: 64px;
        font-weight: 600;
        line-height: 82px;
        color: #518581;
        padding-bottom: 20px;
    }
    .second--section .number--card h3{
        font-size: 24px;
        font-weight: 600;
        line-height: 32px;
        color: #151411;
    }
    .second--section .number--card p{
        font-size: 18px;
        font-weight: 500;
        line-height: 32.4px;
        color: #AFADB5;
    }
    @media screen and (max-width: 768px) {
        .second--section{
            padding: 0px 20px 50px !important;
            grid-template-columns: repeat(1, 1fr) !important;
            gap: 20px;
        }
        .second--section .number--card h2{
            padding-bottom: 0;
            font-size: 32px;
            line-height: 41.6px;
        }
        .second--section .number--card h3{
            font-size: 14px;
            line-height: 22px;
        }
        .second--section .number--card p{
            font-size: 12px;
            line-height: 22px;
        }
    }
</style>