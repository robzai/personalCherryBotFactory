<style type="text/css">
    .wrapper {
        background:Teal;
        text-align: center;
    }
    #return {float:left;}
    #build {float:right;}

    button {
        background-color: Grey; /* Green */
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }
</style>



<div class="row" style="font-family:title">
    <h2>Assembly&Return</h2>
</div>
<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Top</h2>
    </div>
    {top}
    <div class="span4" style="text-align: center;">
		<a href="/part/detail/{link}"><img src="/pix/{pic}" /></a>
        <input type="checkbox" name="checkbox" id="checkbox{id}" value="value">
	</div>
    {/top}
</div>


<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Torso</h2>
    </div>
    {torso}
    <div class="span4" style="text-align: center;">
		<a href="/part/detail/{link}"><img src="/pix/{pic}" /></a>
        <input type="checkbox" name="checkbox" id="checkbox{id}" value="value">
	</div>
    {/torso}
</div>


<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Bottom</h2>
    </div>
    {bottom}
    <div class="span4" style="text-align: center;">
		<a href="/part/detail/{link}"><img src="/pix/{pic}" /></a>
        <input type="checkbox" name="checkbox" id="checkbox{id}" value="value">
	</div>
    {/bottom}
</div>


<div id="return">
    <button type="button">Return to Office</button>
</div>

<div id="build">
    <button type="button">Build It</button>
</div>



