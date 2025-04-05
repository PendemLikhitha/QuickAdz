# QuickAdz 

QuickAdz is a **web-based classified ads platform** that allows users to buy, sell, and discover a wide range of products and services. Developed using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**, this project brings the core functionalities of a modern classifieds system to life.

## 🚀 Features

- 📝 Post Ads: Users can post ads with title, description, category, price, and images.
- 👥 User Accounts: Secure user registration and login system.
- 📂 Category-wise Listings: Organize ads under categories like Electronics, Vehicles, Real Estate, etc.
- 🛡️ Admin Panel: Manage users, ads, and categories with administrative control.
- 📱 Responsive Design: Works seamlessly on desktops, tablets, and mobile devices.
- 🔍 Search & Filter: Browse ads by keyword, category, and location.
- 🔐 Password Recovery with OTP: Users can securely reset their password by receiving a One-Time Password (OTP) via email using PHPMailer.

## 💻 Tech Stack

| Technology  | Description                                         |
|-------------|-----------------------------------------------------|
| PHP         | Server-side scripting for backend functionality     |
| MySQL       | Database to store users, ads, categories, etc.      |
| HTML/CSS    | Structuring and styling the web pages               |
| JavaScript  | Adds interactivity to frontend elements             |
| PHPMailer   | Sends OTP emails for secure password recovery       |

## 📄 Page-by-Page Description

| Page/File            | Description |
|----------------------|-------------|
| `index.php`          | Homepage showing latest ads and navigation links |
| `login.php`          | Login page for users |
| `register.php`       | New user registration form |
| `post_ad.php`        | Allows logged-in users to post a new ad |
| `view_ad.php`        | Displays full details of a selected ad |
| `user_dashboard.php` | User profile page with their posted ads |
| `edit_ad.php`        | Edit existing ads (for users who posted them) |
| `delete_ad.php`      | Delete ad functionality |
| `forgot_password.php`| Starts the OTP-based password reset process |
| `verify_otp.php`     | Verifies OTP sent to email via PHPMailer |
| `reset_password.php` | Lets user set a new password after OTP verification |
| `admin/`             | Contains admin panel for managing users, ads, categories |
| `db_config.php`      | Database connection configuration |
| `css/`               | Contains custom styling files |
| `js/`                | JavaScript files for client-side interaction |
| `images/`            | Folder to store uploaded ad images |

## ✉️ Email OTP Verification (PHPMailer)

QuickAdz includes a secure **Forgot Password** workflow using **PHPMailer**. Here's how it works:

1. User clicks on "Forgot Password".
2. An OTP is sent to the registered email using PHPMailer.
3. User enters the OTP to verify identity.
4. Upon successful verification, the user can set a new password.

🔒 This ensures account security and prevents unauthorized password changes.
## ⚙️ Setup Instructions

1. **Clone the repository**

   ```bash
   git clone https://github.com/PendemLikhitha/QuickAdz.git
   cd QuickAdz
2. **Setup your database**
   - Place the `create_db.php` in the htdocs folder.
   - Run http://localhost/create_db.php in your browser,It will automatically sets up your Database tables.

3. **Run the project locally**
   - Place the project in your `htdocs` folder (if using XAMPP).
   - Start Apache and MySQL from the XAMPP control panel.
   - Visit `http://localhost/QuickAdz` in your browser.

## 📸 Screenshots

###  Home Page

![image](https://github.com/user-attachments/assets/b82c2ee3-9728-4b17-94df-5b95437d34b3)
![image](https://github.com/user-attachments/assets/daf95663-4e41-4e13-836f-c08a28eec2c9)
![image](https://github.com/user-attachments/assets/66c1d773-1648-47f1-bd7b-2e10e1ab6616)
![image](https://github.com/user-attachments/assets/e15de880-a823-4371-a90e-dd27ee58eb40)


###  About Page

![Image](https://github.com/user-attachments/assets/3ddd90fe-552d-4b28-80a8-ffe8e8c3fe39)

###  Categories Page

![Image](https://github.com/user-attachments/assets/f3dc6202-7fdb-42cf-a1f0-f2e1e37f34b7)
![Image](https://github.com/user-attachments/assets/f1a77a97-df6f-4cfe-abb0-78b6a54b1d31)

###  Login Page

![Image](https://github.com/user-attachments/assets/3cfc7013-1850-424b-8e07-4472a2fccb11)

###  SignUp Page

![Image](https://github.com/user-attachments/assets/bb941a51-b0db-4647-ada1-471bc760efca)

### FORGOT PASSWORD PAGE 

![Screenshot 2025-04-02 201752](https://github.com/user-attachments/assets/7de3f2dd-828c-470d-ae3a-7a89615cfa4d)


### OTP received in the email

![Screenshot 2025-04-02 201817](https://github.com/user-attachments/assets/0b41571c-6be3-465d-b4ab-07e9ef02f7b0)


### OTP VERIFICATION PAGE 

![Screenshot 2025-04-02 201832](https://github.com/user-attachments/assets/720aee49-2b2c-43bf-88c2-0de0e3d36b43)


### PASSWORD RESET PAGE 

![Screenshot 2025-04-02 201853](https://github.com/user-attachments/assets/14f667cf-1c68-4ef0-8496-4596471b8efe)


###  User Dashboard Page

![Screenshot 2025-04-03 105638](https://github.com/user-attachments/assets/1dc97e8f-9c25-4dc6-a442-70aa98e1f014)



###  Posting Ad Page

![Screenshot 2025-04-02 201324](https://github.com/user-attachments/assets/aea68e11-30c4-41f7-bd90-bd016b322b27)



### After Posting an Ad

![Screenshot 2025-04-02 201642](https://github.com/user-attachments/assets/2ab110d9-327b-4995-ba5c-e65f60cb549c)



###  Edit Profile Page

![Screenshot 2025-04-02 201516](https://github.com/user-attachments/assets/63af675d-e498-4d39-b1d3-ca6208faad93)


### After editing profile

![Screenshot 2025-04-02 201516](https://github.com/user-attachments/assets/701358e5-f8f8-42fa-b091-54bf7961a3f3)


### EDIT POST PAGE

![Screenshot 2025-04-02 201544](https://github.com/user-attachments/assets/a6369211-a0b4-4155-b810-e0221e305f97)


###  AdminDashboard Page

![Screenshot 2025-04-02 201712](https://github.com/user-attachments/assets/52066f96-6a5f-46ca-b1d7-4fd22fbb9cfb)


### MANAGE USERS PAGE

![Screenshot 2025-04-02 201720](https://github.com/user-attachments/assets/deb6a6a6-8e99-400b-aed6-045b073e8cd4)


### MANAGE ADS PAGE

![Screenshot 2025-04-02 201733](https://github.com/user-attachments/assets/9298afce-7da9-457f-b109-1a340a6cfcc4)


### DATABASE : classified_db

![image](https://github.com/user-attachments/assets/caf4062b-3164-4647-8c63-88ab2b6e3ce5)

### DATABASE : users table

![image](https://github.com/user-attachments/assets/b38b7919-8650-4523-8436-67e19d288f3b)

### DATABASE : ads table

![image](https://github.com/user-attachments/assets/e6f7bf93-88d9-461f-94b7-8bdba8fea64e)


## 🔧 Future Enhancements

- Image gallery for ads
- Messaging between users
- Location-based ad filtering with Google Maps
- Email verification on signup
  
---

Made with ❤️ by [Pendem Likhitha](https://github.com/PendemLikhitha)
