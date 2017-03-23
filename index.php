<?php
    echo "<div style='border: solid 0px red; margin: 20 20 20 20'>";

    echo "<h1>Welcome to Audio libros API</h1>";
    echo "<ul>";
    echo "<li><a href='books.php' target='_BLANK'>All books</a></li>";
    echo "<li><a href='users.php' target='_BLANK'>All users</a></li>";
    echo "</ul>";
    
    echo "<h2>Validate user</h2>";
    echo "<br/>";
    echo "<form action='valida_User.php' method='post' target='_BLANK'>";
    echo "    <input type='text' placeholder='username' id='usuario' name='usuario' /><br/>";
    echo "    <input type='password' placeholder='password' id='password' name='password' /><br/>";
    echo "    <input type='submit' value='submit' />";
    echo "</form>";
    echo "<p>&nbsp;</p>";

    echo "<h2>Register user</h2>";
    echo "<br/>";
    echo "<form action='registro.php' method='post' target='_BLANK'>";
    echo "    <input type='text' placeholder='username' id='usuario' name='usuario' /><br/>";
    echo "    <input type='text' placeholder='email' id='correo' name='correo' /><br/>";
    echo "    <input type='password' placeholder='password' id='password' name='password' /><br/>";
    echo "    <input type='password' placeholder='re-password' id='clave' name='clave' /><br/>";
    echo "    <input type='submit' value='submit' />";
    echo "</form>";
    echo "<p>&nbsp;</p>";    

    echo "</div>";
?>
