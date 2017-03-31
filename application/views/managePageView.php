<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/assemblyView.css"/>
</head>

<div class="row" style="font-family:title">
    <h2>Manage Page</h2>
</div>

<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Register</h2>
    </div>
    <form method ="POST" action="/managepage/register">
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    {message}
</div>

<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Sell assembled bot</h2>
    </div>
    {robots}
    <div class="span4" style="text-align: center;">
        <a href="/part/detail/{link}"><img src="/pix/parts/{top}.jpeg" /></a>
        <a href="/part/detail/{link}"><img src="/pix/parts/{torso}.jpeg" /></a>
        <a href="/part/detail/{link}"><img src="/pix/parts/{bottom}.jpeg" /></a>
        <input type="radio" name="gender" value="checkbox{id}"> checkbox{id}
    </div>
    {/robots}
    <button type="button" class="btn btn-default">sell</button>
</div>

<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Reboot the factory</h2>
    </div>
    <form method ="POST" action="/managepage/reboot">
        <button type="submit" class="btn btn-default">Reboot</button>       
    </form>
    {reboot}
</div>




