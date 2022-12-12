<?php
    include "head.inc.php";
?>
   
<!--HEADER-->
    <header>
        <div class='container'>
            <h1>Přihlaste se</h1>
        </div>    
    </header>
<!--MAIN-->
    <main class='container'>
        <form action='resources/login.php' method='POST'>
            <div class='form-group'>
                <label for='username'>Username:</label>
                <input id='username' type='text' class='form-control' name='username'>
            </div>
            <div class='form-group'>
                <label for='password'>Password:</label>
                <input id='password' type='password' class='form-control' name='password'>
            </div>
            
            <button type='submit' class='btn btn-primary'>Login</button>
        </form>
        <hr>
        <!--
        <p>Don&#8217;t have an account?</p>
        <a href='signup.php' class='btn btn-primary'>Sign Up Here</a>
        -->
    </main>
<!--FOOTER-->
    <footer class="text-center">
         <nav class='navbar navbar-inverse navbar-fixed-bottom'>
             <div class='container-fluid'>
                 <ul class='nav navbar-nav'>
                     <li><a href="#"><i class='fa fa-instagram'>Instagram</i></a></li>
                 </ul>
                 <span class='text-center'>Copyright &copy; 2014-2021 Designed and Coded by Vladislav Páleník</span>
                 <ul class='nav navbar-nav navbar-right'>
                     <li><a href="web/index.php?stranka=Kontakty">Kontakty</a></li>
                 </ul>
             </div>

         </nav>
     </footer>    
</body>            

    <!-- Jquery library-->    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <!-- Bootstrap JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/ajax.js"></script>    
</html>    
