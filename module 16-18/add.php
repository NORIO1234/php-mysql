<?php


    $host = "localhost";
    $db = "movie";
    $user = "root";
    $pass = "";


    try{
        $connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);


        $sql = "CREATE TABLE users (
            id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            surname VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            confirmpassword VARCHAR(255) NOT NULL
        );


       CREATE TABLE movies (
       id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       m_name VARCHAR(255) NOT NULL,
       m_desc VARCHAR(255) NOT NULL,
       m_category VARCHAR(255) NOT NULL,
       m_year VARCHAR(255) NOT NULL
       );

       CREATE TABLE bookings(
       id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       user_id VARCHAR(255) NOT NULL,
       movie_id VARCHAR(255) NOT NULL,
       nr_tickets VARCHAR(255) NOT NULL,
       date VARCHAR(255) NOT NULL,
       time VARCHAR(255) NOT NULL
       );

        INSERT INTO users(id,name,surname,username,email,password,confirm_password) VALUES
        (1, 'Elma', 'Kutllovci', 'Elma123', 'elma@gmail.com', elma1234', 'elma1234'),
        (2, 'Ilma', 'Terstena', 'Ilma123', 'Ilma@gmail.com', 'ilma1234', 'ilma1234');

        INSERT INTO movies(id, m_name, m_desc, m_category, m_year) VALUES
        (1, 'Spiderman', 'Lorem Ipsum', 'Action', '2027'),
        (2, 'TEst', 'Lorem Ipsum', 'Comedy', '2025');

        INSERT INTO bookings(id, user_id, movie_id, nr_tickets, date, time) VALUES
        (1, 1, 2, 3, '19/04/2026', '19:00'),
        (2, 2, 1, 2, '20/04/2026', '21:00');
        ";


        $connection->exec($sql);


        echo("Table created");
        
    }catch(Exception $e){


        echo("Table not created");


    }
?>
