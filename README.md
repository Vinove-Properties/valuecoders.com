# WordPress Project with Lead Forms & Zoho CRM Integration

## Overview
This project is a WordPress-based website that includes lead forms for capturing user inquiries and integrates with Zoho CRM to manage and automate lead processing.

## Features
- **Lead Forms**: Custom-built lead generation forms for capturing user data.
- **Zoho CRM Integration**: Automatic lead submission to Zoho CRM for efficient management.
- **SEO Optimized**: Optimized for search engines to improve discoverability.
- **Responsive Design**: Mobile-friendly UI/UX.
- **WordPress Block Editor Compatibility**: Supports modern WordPress block-based themes.

## Technology Stack
- **CMS**: WordPress
- **Forms**: Contact Form 7 / Gravity Forms / Custom Forms (Modify as per your setup)
- **Zoho CRM Integration**: Zoho API / Zoho CRM Plugin
- **Hosting**: Any WordPress-compatible hosting (e.g., Bluehost, SiteGround, AWS, etc.)

## Installation & Setup
1. **Install WordPress**:
   - Download and install WordPress from [WordPress.org](https://wordpress.org/).
   - Set up your database and configure `wp-config.php`.
2. **Install Required Plugins**:
   - Contact Form 7 / Gravity Forms / Custom Form Plugin
   - Zoho CRM Plugin or Custom API Integration Plugin
3. **Configure Zoho CRM Integration**:
   - Get API credentials from Zoho CRM.
   - Set up the Zoho CRM plugin or integrate via custom API calls.
4. **Set Up Lead Forms**:
   - Create and configure forms to collect user information.
   - Map form fields to Zoho CRM fields.
5. **Test the Integration**:
   - Submit a test lead and verify if it reaches Zoho CRM.

## Zoho CRM API Integration (If Using Custom API)
- Obtain **Zoho API credentials** (Client ID, Client Secret, Redirect URL, and Auth Token).
- Implement OAuth 2.0 authentication.
- Use the Zoho CRM API to send lead data from WordPress.
- Example API Request:
  ```bash
  curl -X POST "https://www.zohoapis.com/crm/v2/Leads" \
       -H "Authorization: Zoho-oauthtoken YOUR_ACCESS_TOKEN" \
       -H "Content-Type: application/json" \
       -d '{"data": [{"Company": "Example Company", "Last_Name": "Doe", "Email": "john@example.com"}]}'
  ```

## Troubleshooting
- **Zoho CRM Leads Not Updating?**
  - Check API credentials and refresh tokens.
  - Verify field mappings in the integration settings.
- **Forms Not Submitting Data?**
  - Check plugin settings and form configurations.
  - Inspect JavaScript console for errors.

## Future Enhancements
- Implement webhook-based real-time lead updates.
- Add email notifications on lead submissions.
- Enhance spam protection with CAPTCHA.

## License
This project is licensed under the [MIT License](LICENSE).

## Contact
For support or inquiries, contact [your-email@example.com](mailto:your-email@example.com).

