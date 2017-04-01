<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/assemblyview.css"/>
</head>


<div class="text-center">
    <h2>Assembly&Return</h2>
</div>

<form method="POST" action="/Assembly/assemble">
        <div class="row">
            <div class="wrapper" style="color:#FFFFFF">
                <h4>Top</h4>
            </div>
            {top}
            <div class="span4" style="text-align: center;">
                <img src="/pix/parts/{pic}.jpeg" />
                <input type="checkbox" name='pick[]' value="top{link}">
            </div>
            {/top}
        </div>


        <div class="row">
            <div class="wrapper" style="color:#FFFFFF">
                <h4>Torso</h4>
            </div>
            {torso}
            <div class="span4" style="text-align: center;">
                <img src="/pix/parts/{pic}.jpeg" />
                <input type="checkbox" name='pick[]' value="torso{link}">
            </div>
            {/torso}
        </div>


        <div class="row">
            <div class="wrapper" style="color:#FFFFFF">
                <h4>Bottom</h4>
            </div>
            {bottom}
            <div class="span4" style="text-align: center;">
                <img src="/pix/parts/{pic}.jpeg" />
                <input type="checkbox" name='pick[]' value="bottom{link}">
            </div>
            {/bottom}
        </div>

        <div id="return">
            <input type='submit' value='Return to Office'/>
        </div>

        <div id="build">
            <input type='submit' value='Build It'/>
        </div>
</form>



