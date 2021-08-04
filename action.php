<!DOCTYPE html>
<html>
    <head>
        <title>prediction</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>
    <body>
          
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = ' ';
            
            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=clients", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

            // code sql
            $pre_data = 'SELECT * FROM `client` ORDER BY RAND() LIMIT 20';
            $conn->exec($pre_data);
            
            $predict_link = 'http://localhost:8501/df=?' . $pre_data;
            $predict = file_get_contents ($predict_link);




        ?>
    </body>
</html>