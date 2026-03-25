CREATE DATABASE leads_db;
USE leads_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100)
);

CREATE TABLE leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    barcode VARCHAR(50),
    nama VARCHAR(100),
    no_hp VARCHAR(20),
    alamat TEXT,
    source VARCHAR(50),
    status_join VARCHAR(20),
    remax VARCHAR(20),
    mc VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('Alice', '123'),
('Adi', '123');

INSERT INTO leads (date, barcode, nama, no_hp, alamat, source, status_join, remax, mc) VALUES
('2026-03-25','BRG001','Budi','08123','Palembang','Online','Join','Ya','Alice'),
('2026-03-25','BRG002','Siti','08124','Jakarta','Offline','Tidak','Tidak','Adi'),
('2026-03-25','BRG003','Joko','08125','Bandung','Online','Join','Ya','Alice');