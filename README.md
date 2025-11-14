# Safisha Rugs
[Live Deployment](https://iamdanyyy.github.io/Safisha-Rugs/)

Safisha Rugs is a modern, responsive website for a local carpet and upholstery cleaning business based in Kabarnet. The site showcases services, company information, and allows customers to send inquiries directly through a stylish contact form.

## Features
- Clean, modern, and mobile-friendly design
- Animated custom cursor for a unique user experience
- Service and about pages with engaging visuals
- Contact form with MySQL/PHP backend for storing customer inquiries
- Social media and direct contact links
- Animated feedback for form submission

## Tech Stack
- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP (for contact form submission)
- **Database:** MySQL
- **Icons:** Font Awesome
- **Fonts:** Google Fonts (Montserrat)

## Setup Instructions

### 1. Clone or Download the Repository
```
git clone <repo-url>
cd Safisha-Rugs
```

### 2. Database Setup
- Create a MySQL database named `safisha_rugs`.
- Create the `Inquiries` table with the following SQL:

```sql
CREATE TABLE Inquiries (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(15),
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

- Update the database credentials in `contact_submit.php` if needed:
  - `$host`, `$user`, `$password`, `$dbname`

### 3. Deploy the Site
- Place all files on your web server (ensure PHP is enabled).
- The contact form will POST to `contact_submit.php` and store inquiries in the database.

### 4. Usage
- Open `index.html` in your browser to view the homepage.
- Navigate to `contact.html` to test the inquiry form.
- Submitted inquiries will appear in the `Inquiries` table in your MySQL database.

## Customization
- Update images in the `assets/` folder to match your branding.
- Edit text and contact details in the HTML files as needed.
- Adjust styles in `styles.css` for further branding.

## Credits & Contact
- **Design & Development:** [Your Name or Company]
- **Contact:** info@safisharugs.co.ke
- **Instagram:** [@safisharugs](https://instagram.com/safisharugs)

---

*Safisha Rugs – We Bring Your Carpets Back to Life!* 
