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
</div>

<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Sell assembled bot</h2>
    </div>
    {top}
    <div class="span4" style="text-align: center;">
        <a href="/part/detail/{link}"><img src="/pix/parts/{pic}.jpeg" /></a>
        <input type="radio" name="gender" value="checkbox{id}"> checkbox{id}
    </div>
    {/top}
</div>

<div class="row">
    <div class="wrapper" style="color:#FFFFFF">
        <h2>Reboot the factory</h2>
    </div>
    <button type="button" class="btn btn-default">Reboot</button>
</div>




