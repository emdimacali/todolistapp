CREATE DATABASE IF NOT EXISTS todolistapp;
USE todolistapp;

CREATE TABLE IF NOT EXISTS app_users(
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (email)
);

CREATE TABLE IF NOT EXISTS tasks(
    id int(255) NOT NULL AUTO_INCREMENT,
    task_name varchar(500) NOT NULL,
    date_created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    date_completed datetime,
    email  varchar(255) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(email) REFERENCES app_users(email)
);