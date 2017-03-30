<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/assemblyView.css"/>
</head>

<div class="row" style="font-family:title">
    <h2>Assembly&Return</h2>
</div>
<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Top</h2>
    </div>
    {top}
    <div class="span4" style="text-align: center;">
		<a href="/part/detail/{link}"><img src="/pix/parts/{pic}.jpeg" /></a>
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
		<a href="/part/detail/{link}"><img src="/pix/parts/{pic}.jpeg" /></a>
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
		<a href="/part/detail/{link}"><img src="/pix/parts/{pic}.jpeg" /></a>
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



