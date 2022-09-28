<h3 class="code-line" data-line-start=0 data-line-end=1 ><a id="Test_for_Full_Stack_Developer_Back_End_0"></a>Test for Full Stack Developer Back End</h3>
<p class="has-line-data" data-line-start="1" data-line-end="2">Author : Dhanushka Salinda Jayawardana</p>
<h3 class="code-line" data-line-start=3 data-line-end=4 ><a id="Migrations_3"></a>Migrations</h3>
<p class="has-line-data" data-line-start="4" data-line-end="5">Migrations must run following order (countries table, departments table, designation table, employee table, then other tables (User table, persoal_access_token table etc.))</p>
<ul>
<li class="has-line-data" data-line-start="5" data-line-end="6">php artisan migrate --path=database/migrations/2022_09_28_095106_create_countries_table.php</li>
<li class="has-line-data" data-line-start="6" data-line-end="7">php artisan migrate --path=database/migrations/2022_09_28_095143_create_departments_table.php</li>
<li class="has-line-data" data-line-start="7" data-line-end="8">php artisan migrate --path=database/migrations/2022_09_28_095159_create_designations_table.php</li>
<li class="has-line-data" data-line-start="8" data-line-end="9">php artisan migrate --path=database/migrations/2022_09_28_092455_create_employees_table.php</li>
<li class="has-line-data" data-line-start="9" data-line-end="10">php artisan migrate</li>
</ul>
<h3 class="code-line" data-line-start=10 data-line-end=11 ><a id="Database_Seeds_10"></a>Database Seeds</h3>
<p class="has-line-data" data-line-start="11" data-line-end="12">To fill the predefined data in Countries, departments and designations table, the db seeds are fill some example data to the certain tables.</p>
<ul>
<li class="has-line-data" data-line-start="12" data-line-end="14">php artisan db:seed</li>
</ul>
<p class="has-line-data" data-line-start="14" data-line-end="15">OR</p>
<p class="has-line-data" data-line-start="16" data-line-end="17">Import database dump from the additional/DB_Dump/dream-come-true-crud.sql file.</p>
<h3 class="code-line" data-line-start=18 data-line-end=19 ><a id="API_Routes_18"></a>API Routes</h3>
<p class="has-line-data" data-line-start="19" data-line-end="20">the project contails following API routes.</p>
<h3 class="code-line" data-line-start=20 data-line-end=21 ><a id="Employee_related_20"></a>Employee related</h3>
<p class="has-line-data" data-line-start="21" data-line-end="22">These are secured API routes.</p>
<ul>
<li class="has-line-data" data-line-start="22" data-line-end="24">GET /employee  -&gt;Fetch all the employees from the database.<br>
Optional Query Params : search (can search from first name, last name or emp no)</li>
<li class="has-line-data" data-line-start="24" data-line-end="25">POST /employee -&gt; Create / add new employees.</li>
<li class="has-line-data" data-line-start="25" data-line-end="26">GET /employee/{employee_id} -&gt; Fetch single employee details by employee_id</li>
<li class="has-line-data" data-line-start="26" data-line-end="27">PUT /employee/{employee_id} -&gt; Update employee details</li>
<li class="has-line-data" data-line-start="27" data-line-end="28">DELETE /employee/{employee_id} -&gt; Hard delete (fully remove from the database) employee details.</li>
<li class="has-line-data" data-line-start="28" data-line-end="29">DELETE /employee/{employee_id}/delete -&gt;Soft Delete (not remove from the DB, but update a flag as deleted).</li>
</ul>
<h3 class="code-line" data-line-start=29 data-line-end=30 ><a id="User_related_29"></a>User related</h3>
<p class="has-line-data" data-line-start="30" data-line-end="32">Authentications done by using laravel Sanctum package.<br>
These are public API exept the logout API.</p>
<ul>
<li class="has-line-data" data-line-start="32" data-line-end="33">POST /register  -&gt; Register new user.</li>
<li class="has-line-data" data-line-start="33" data-line-end="34">POST /login -&gt; User Login</li>
<li class="has-line-data" data-line-start="34" data-line-end="36">POST /logout -&gt; User Logout</li>
</ul>
<p class="has-line-data" data-line-start="36" data-line-end="37">Added Postman Collection export file to additional/postman_collection folder.</p>