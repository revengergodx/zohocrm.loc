<h2>SPA with API for creating records in zohocrm</h2>

<h4>I used local server with MySql. </h4>
<ul>
    <li>Configure .env file, migrate database and seed it.</li>
    <li>Install all dependencies.</li> 
    <li>Create your clientId, clientSecret on (https://api-console.zoho.eu/) (if you from europe feel free to use .eu if not check https://www.zoho.com/crm/developer/docs/api/v3/multi-dc.html)</li>
    <li>Create refresh token according to https://www.zoho.com/crm/developer/docs/api/v3/auth-request.html then start local server</li>
    <li><h3>Enter yours clientId, clientSecret and refresh token to app/service/TokenService.php</h3></li>
    <li>Start your server and Vite</li>
</ul>
