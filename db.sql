CREATE DATABASE pc_components;

CREATE TABLE pc(
    pc_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    pc_name VARCHAR(50),
    pc_desc VARCHAR(100)
);

CREATE TABLE components(
    component_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    component_name VARCHAR(50),
    component_desc VARCHAR(100),
    component_price INT UNSIGNED,
    pc_id INT UNSIGNED,
    FOREIGN KEY (pc_id) REFERENCES pc(pc_id)
);

CREATE TABLE users(
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(75)
);

ALTER TABLE pc ADD COLUMN user_id INTEGER UNSIGNED NOT NULL;

ALTER TABLE pc ADD CONSTRAINT fk_user
FOREIGN KEY(user_id)
REFERENCES users(user_id);
ALTER TABLE users drop username;