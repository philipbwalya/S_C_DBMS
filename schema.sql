-- Database Schema for Car Rental Project

CREATE DATABASE IF NOT EXISTS car_rental;
USE car_rental;

-- 1. Cars Table
CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    location VARCHAR(50) NOT NULL,
    price_per_day DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Bookings Table
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    license_number VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    rental_duration_days INT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
);

-- 3. Contact Messages Table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Data for Cars
INSERT INTO cars (name, image_url, location, price_per_day) VALUES
('TOYOTA FORTUNNER', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/2015_Toyota_Fortuner_%28New_Zealand%29.jpg/1600px-2015_Toyota_Fortuner_%28New_Zealand%29.jpg', 'Lusaka', 400.00),
('TOYOTA LANDCRUISER', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/2021_Toyota_Land_Cruiser_300_3.4_ZX_%28Colombia%29_front_view_04.png/1600px-2021_Toyota_Land_Cruiser_300_3.4_ZX_%28Colombia%29_front_view_04.png', 'Lusaka', 450.00),
('TOYOTA ALPHARD', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/2018-2023_Toyota_Alphard_X.jpg/960px-2018-2023_Toyota_Alphard_X.jpg', 'Ndola', 350.00),
('HONDA FIT', 'https://upload.wikimedia.org/wikipedia/commons/d/db/2016_Honda_Shuttle_%28GP7%29_1.5G_station_wagon_%282017-11-28%29.jpg', 'Kabwe', 150.00),
('NISSAN JUKE', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Nissan_Juke_%28F16%29_IMG_4903.jpg/1600px-Nissan_Juke_%28F16%29_IMG_4903.jpg', 'Ndola', 200.00),
('NISSAN PATROL', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/2016_Nissan_Patrol_%28Y62%29_Ti-L_wagon_%282018-09-17%29_01.jpg/1600px-2016_Nissan_Patrol_%28Y62%29_Ti-L_wagon_%282018-09-17%29_01.jpg', 'Lusaka', 350.00),
('TOYOTA HILUX', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/2016_Toyota_HiLux_Invincible_D-4D_4WD_2.4_Front.jpg/960px-2016_Toyota_HiLux_Invincible_D-4D_4WD_2.4_Front.jpg', 'Kitwe', 300.00),
('TOYOTA RAV4', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/2019_Toyota_RAV4_LE_2.5L_front_4.14.19.jpg/960px-2019_Toyota_RAV4_LE_2.5L_front_4.14.19.jpg', 'Kitwe', 200.00),
('TOYOTA VITZ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Daihatsu_Charade_1.33_Basis_%28V%29_%E2%80%93_Frontansicht%2C_21._Juni_2011%2C_Ratingen.jpg/960px-Daihatsu_Charade_1.33_Basis_%28V%29_%E2%80%93_Frontansicht%2C_21._Juni_2011%2C_Ratingen.jpg', 'Lusaka', 150.00),
('TOYOTA COASTER', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Toyota_Coaster_GX_XZB70.jpg/960px-Toyota_Coaster_GX_XZB70.jpg', 'Lusaka', 450.00),
('TOYOTA NOAH', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/2022_Toyota_Noah_Hybrid_S-G.jpg/960px-2022_Toyota_Noah_Hybrid_S-G.jpg', 'Kabwe', 250.00),
('BMW X5', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/2019_BMW_X5_M50d_Automatic_3.0.jpg/960px-2019_BMW_X5_M50d_Automatic_3.0.jpg', 'Ndola', 250.00),
('BENZ C200', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Mercedes-Benz_W206_IMG_6380.jpg/960px-Mercedes-Benz_W206_IMG_6380.jpg', 'Lusaka', 250.00),
('BMW X6', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/BMW_G06_IMG_3142.jpg/960px-BMW_G06_IMG_3142.jpg', 'Livingstone', 350.00),
('VW Golf', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/2020_Volkswagen_Golf_Style_1.5_Front.jpg/960px-2020_Volkswagen_Golf_Style_1.5_Front.jpg', 'Livingstone', 250.00);
