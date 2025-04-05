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

![Image](https://github.com/user-attachments/assets/4c769bf2-c0f2-44e5-b07b-c9fc20c43957)

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

![Image](https://github.com/user-attachments/assets/00346c79-1857-4e97-942f-9faddcdcb637)

### OTP received in the email

![image](https://github.com/user-attachments/assets/cc39b757-d64a-4c3f-b19f-445efc86e97a)

### OTP VERIFICATION PAGE 

![Image](https://github.com/user-attachments/assets/2d0a79b6-e06e-445b-9006-e13e98c56867)

### PASSWORD RESET PAGE 

![Image](https://github.com/user-attachments/assets/97e2b7dd-73cf-4552-a0a2-6944215e2b58)

###  User Dashboard Page

![image](https://github.com/user-attachments/assets/93d727b9-f856-4433-bb90-00fd84c99fc8)


###  Posting Ad Page

![image](https://github.com/user-attachments/assets/941de105-0abe-4558-b805-c3115a19fa58)


###  Edit Profile Page

![image](https://github.com/user-attachments/assets/f6de0129-0738-488d-9833-98bbf45a3707)


### EDIT POST PAGE

![image](https://github.com/user-attachments/assets/e05c9154-552a-453d-9e04-41b1f4471dae)

###  AdminDashboard Page

![image](https://github.com/user-attachments/assets/ecc3afa5-3931-4308-949f-f7c328f037de)

### MANAGE USERS PAGE

![image](https://github.com/user-attachments/assets/c96c6263-6fe5-4e9e-b609-5ff26d8cf4d3)

### MANAGE USERS PAGE

![image](https://github.com/user-attachments/assets/4d4b8e0b-9c0d-43e7-8549-b12566fd1e62)

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
