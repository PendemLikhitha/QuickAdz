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

![Image](https://github.com/user-attachments/assets/be9ed38a-4299-4fbb-ac63-d80749907aca)

## 🔧 Future Enhancements

- Image gallery for ads
- Messaging between users
- Location-based ad filtering with Google Maps
- Email verification on signup
  
---

Made with ❤️ by [Pendem Likhitha](https://github.com/PendemLikhitha)
