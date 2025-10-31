-- --------------------------------------------------------
-- Database: `event_management`
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS event_management;
USE event_management;

-- --------------------------------------------------------
-- 1️⃣ Admin Table
-- --------------------------------------------------------
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admin (name, email, password) VALUES
('Admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------
-- 2️⃣ Vendor Table
-- --------------------------------------------------------
CREATE TABLE vendor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vendor (name, email, password, contact, address) VALUES
('Vendor 1', 'vendor1@gmail.com', '12345', '9876543210', 'Hyderabad'),
('Vendor 2', 'vendor2@gmail.com', '12345', '9999999999', 'Chennai');

-- --------------------------------------------------------
-- 3️⃣ User Table
-- --------------------------------------------------------
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(100),
    pincode VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user (name, email, password, contact, address, city, state, pincode) VALUES
('User 1', 'user1@gmail.com', '12345', '9998877665', 'Banjara Hills', 'Hyderabad', 'Telangana', '500034');

-- --------------------------------------------------------
-- 4️⃣ Products Table
-- --------------------------------------------------------
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vendor_id) REFERENCES vendor(id) ON DELETE CASCADE
);

INSERT INTO products (vendor_id, product_name, price, image) VALUES
(1, 'Stage Lighting Setup', 3000, 'light.jpg'),
(1, 'Flower Decoration', 2000, 'flower.jpg'),
(2, 'Sound System', 4000, 'sound.jpg');

-- --------------------------------------------------------
-- 5️⃣ Cart Table
-- --------------------------------------------------------
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- --------------------------------------------------------
-- 6️⃣ Orders Table
-- --------------------------------------------------------
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50),
    status VARCHAR(50) DEFAULT 'Received',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- --------------------------------------------------------
-- 7️⃣ Order Details Table (for each product in an order)
-- --------------------------------------------------------
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- --------------------------------------------------------
-- 8️⃣ Request Item Table (for vendors requesting restock)
-- --------------------------------------------------------
CREATE TABLE request_item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT NOT NULL,
    item_name VARCHAR(150),
    quantity INT,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vendor_id) REFERENCES vendor(id) ON DELETE CASCADE
);

-- --------------------------------------------------------
-- 9️⃣ Product Status Table (for admin/vendor tracking)
-- --------------------------------------------------------
CREATE TABLE product_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    vendor_id INT NOT NULL,
    status ENUM('Received','Ready for Shipping','Out for Delivery','Delivered') DEFAULT 'Received',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (vendor_id) REFERENCES vendor(id) ON DELETE CASCADE
);
