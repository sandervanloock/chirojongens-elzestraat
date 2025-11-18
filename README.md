# Chiro Elzestraat Website

This is the landing page website for Chiro Elzestraat, providing links to the Chirojongens and Chiromeisjes sections.

## Deployment

The website is automatically deployed to the production server via SFTP when changes are pushed to the `main` branch.

### SFTP Deployment Setup

The deployment is handled by a GitHub Actions workflow that uses SFTP to upload files to the server.

#### Required GitHub Secrets

To enable automatic deployment, you need to configure the following secrets in your GitHub repository:

1. **SFTP_HOST** - The hostname or IP address of your SFTP server
2. **SFTP_USERNAME** - The username for SFTP authentication
3. **SFTP_PASSWORD** - The password for SFTP authentication

#### How to Add Secrets to GitHub Repository

1. Go to your GitHub repository
2. Click on **Settings** (in the top menu)
3. In the left sidebar, click on **Secrets and variables** > **Actions**
4. Click the **New repository secret** button
5. Add each of the following secrets:
   - **Name**: `SFTP_HOST`
     - **Value**: Your SFTP server hostname (e.g., `example.com` or `192.168.1.100`)
   - **Name**: `SFTP_USERNAME`
     - **Value**: Your SFTP username
   - **Name**: `SFTP_PASSWORD`
     - **Value**: Your SFTP password

#### Deployment Configuration

The deployment workflow is configured in `.github/workflows/main.yml`. By default:

- **Trigger**: Automatic deployment on push to `main` branch
- **Remote path**: `/www` (can be modified in the workflow file)
- **Port**: 22 (default SFTP port)
- **Delete remote files**: Disabled (existing files are overwritten but not deleted)

To change the deployment target directory, edit the `remote_path` value in `.github/workflows/main.yml`.

#### Manual Deployment

You can also trigger a deployment manually:

1. Go to the **Actions** tab in your GitHub repository
2. Select the "Deploy website via SFTP" workflow
3. Click **Run workflow**
4. Select the branch and click **Run workflow**

### Local Development

This is a static HTML website. You can:

1. Open `index.html` directly in a browser
2. Or use a local web server:
   ```bash
   python -m http.server 8000
   ```
   Then visit `http://localhost:8000`

## Project Structure

```
.
├── index.html          # Main landing page
├── css/               # Stylesheets
├── bootstrap/         # Bootstrap framework files
├── img/               # Images
├── chirojongens/      # Chirojongens content
├── verhuur/           # Rental information
└── tprogram/          # Program information
```

## Technologies

- HTML5
- CSS3
- Bootstrap 3
- Font Awesome icons
- Google Analytics
