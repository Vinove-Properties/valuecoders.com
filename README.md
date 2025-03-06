## Overview
This project is a WordPress-based website that includes lead forms for capturing user inquiries and integrates with Zoho CRM to manage and automate lead processing.

## Github Repo
https://github.com/Vinove-Properties/valuecoders.com

## Features
- **Lead Forms**: Custom-built lead generation forms for capturing user data.
- **Zoho CRM Integration**: Automatic lead submission to Zoho CRM for efficient management.
- **Calendly Integration**: Added webhook for calendly leads into ZOHO CRM
- **ACF Bases Wordpress Theme**: Sections & fields managed with the help of Advanced Custom Field Plugin

## Technology Stack
- **CMS**: WordPress
- **Forms**: Custom Forms (Modify as per your setup)
- **Zoho CRM Integration**: Zoho API / Zoho CRM VESRION 2.0

## Installation & Setup
1. **Install WordPress**:
   - Download and install WordPress from [WordPress.org](https://wordpress.org/).
   - Set up your database and configure `wp-config.php`.
2. Required Plugins   
   ✅ Advanced Custom Fields PRO – Custom fields for managing theme content.
   ✅ Better Search Replace – Database updates and search-replace operations.
   ✅ Classic Editor – Restores classic WordPress editor.
   ✅ Custom Permalinks – Customizes permalink structures.
   ✅ Disable XML-RPC – Blocks XML-RPC attacks.
   ✅ Duplicate Page – Enables easy duplication of pages/posts.
   ✅ Limit Login Attempts Reloaded – Prevents brute-force login attacks.
   ✅ Lock User Account – Enhances security by locking inactive accounts.
   ✅ Login No Captcha reCAPTCHA – Google reCAPTCHA for login security.
   ✅ Prevent Direct Access – Restricts access to private files.
   ✅ Redirection – Manages URL redirects.
   ✅ Rename wp-login.php – Custom login URL for security.
   ✅ Wordfence Security – Firewall & malware protection.
   ✅ WP Rocket – Performance optimization & caching.
   ✅ Yoast SEO – On-page SEO optimization.

3. **Zoho CRM Integration**:
   Integration & API details are documented in the internal Google Sheet. Ensure you follow these steps for CRM setup:
   - Generate Zoho CRM API credentials.
   - Configure authentication tokens in the integration files.
   - Map lead form fields to Zoho CRM lead fields.
   - Test API requests using Postman before deploying.
   https://docs.google.com/spreadsheets/d/1PcExtjjd9MiDgM8m8eyRpix8eIx-mHOQUQPRJgnWe-c/edit?gid=1985896880#gid=1985896880


4. **Lead Forms Setup**:
   Custom Scripts for Lead Handling
   All the script files is located on root ( public_html ) directory.
   sendmail1.php : Manages form submissions & sends email notifications.
   vc-config.php : Stores database connection, email settings, and helper functions.
   vc-mailto.php : Handles lead distribution based on geography & sends notifications.
   

5. **Calendly CRM Integration**
   Email notifications for Calendly leads are handled directly by Calendly.
   CRM integration is managed via a separate webhook:
   Webhook URL: https://www.valuecoders.com/cl-webhook.php
   Script File: cl-webhook.php (Located in the root directory)

### Database Schema for Lead Storage
   The system maintains separate tables for legitimate leads, spam leads, and blocked emails.

   Table : wp_webleads store all the legit lead data
   ```sql
   -- Contact form submissions
   CREATE TABLE `wp_webleads` (
   `id` bigint PRIMARY KEY AUTOINCREMENT,
   `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
   `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
   `phone` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
   `country` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
   `message` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
   `attachments` longtext COLLATE utf8mb4_unicode_520_ci,
   `IP` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
   `source` longtext COLLATE utf8mb4_unicode_520_ci,
   `created_at` datetime NOT NULL
   )

   Table : spam_leads store all the spam lead data
   ```sql
   -- Spam lead submissions
   CREATE TABLE `spam_leads` (
   `ID` bigint PRIMARY KEY AUTOINCREMENT,
   `data` longtext NOT NULL,
   `email` varchar(200) DEFAULT NULL,
   `ip` varchar(255) DEFAULT NULL,
   `created_at` datetime NOT NULL
   )

   Table : spam_attack store all the Block Emails which comes under the spam email attack in 10 emails with same email & IP Address.
   ```sql
   CREATE TABLE `spam_attack` (
   `id` bigint PRIMARY KEY AUTOINCREMENT,
   `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
   `ip` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
   `created_at` datetime NOT NULL
   )

   ***Visitor Tracking (ipinfo_logs)***
   Tracks visitor IP addresses and geolocation data using the IPINFO API.
   ```sql
   CREATE TABLE `spam_attack` (
   `id` bigint PRIMARY KEY AUTOINCREMENT,
   `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
   `ip` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
   `created_at` datetime NOT NULL
   )

### Wordpress theme updates
*** Updated Font Faces (CSS v6.0) ***
LexendDeca-Regular
LexendDeca-Medium
LexendDeca-SemiBold
LexendDeca-Bold

Performance Optimization:
- Minify CSS/JS using WP Rocket.
- Use Lazy Loading for images & videos.
- Optimize database using WP-Optimize.