<?php
if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $dsn = 'mysql:dbname=modmary_db;host=localhost;port=3306';
    $username = 'modmary_modmary';
    $password = 'mod123!@#';

    try {
        $db = new PDO( $dsn, $username, $password );
        $db->exec( "SET CHARACTER SET utf8" );
    } catch( PDOException $e ) {
        die( 'رخداد خطا در هنگام ارتباط با پایگاه داده:<br>' . $e );
    }

		$stmt = $db->prepare( "INSERT INTO users ( user, pass,name,email,tel,family ) VALUES ( ?,?,?,?,?, ? )" );
		$stmt->bindValue( 1, $_POST[ 'user' ] );
		$stmt->bindValue( 2, password_hash( $_POST[ 'pass' ], PASSWORD_BCRYPT ));
		$stmt->execute();

		$signup = true;
	} else {
    $signup = false;
}
?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام در سایت - روکا</title>
    <style>
        body {
            direction: rtl;
            font: 12px tahoma;
        }

        input {
            border: 1px solid #008;
        }

        form {
            padding: 2em;
            margin: 2em;
            background-color: #eee;
        }
    </style>
</head>
<body>
<form method="POST">
    <table>
        <tr>
            <td>نام:</td><td><input type="text" name="password_confirmation"></td>
        </tr>
        <tr>
            <td>نام خانوادگی:</td><td><input type="text" name="password_confirmation"></td>
        </tr>
        <tr>
            <td>ایمیل:</td><td><input type="text" name="password_confirmation"></td>
        </tr>
        <tr>
            <td>تلفن:</td><td><input type="text" name="password_confirmation"></td>
        </tr>

        <tr>
            <td>نام کاربری:</td><td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>گذرواژه:</td><td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>تکرار گذرواژه:</td><td><input type="password" name="password_confirmation"></td>
        </tr>


        <tr>
            <td colspan="2"><input type="submit" value="ثبت نام در سایت"></td>
        </tr>
    </table>
</form>
</body>
</html>