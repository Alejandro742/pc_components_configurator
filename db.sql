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

ALTER TABLE users ADD pc_id INT UNSIGNED;
ALTER TABLE users
ADD CONSTRAINT fk_pc
FOREIGN KEY(pc_id)
REFERENCES pc(pc_id)