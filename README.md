# ISSP Management System

A full-stack web-based ISSP (Information Systems Strategic Plan) Management System built with PHP (CodeIgniter 4), MySQL, and Docker.

This system is designed to centralize and streamline ISSP preparation, consolidation, monitoring, and reporting processes within an organization. It enables structured workflow management, role-based access control, and real-time tracking of tasks and submissions across departments.

---

## Tech Stack

### Backend:
- PHP 8.2
- CodeIgniter 4 Framework
- Apache Web Server

### Database:
- MySQL 8

### DevOps / Environment:
- Docker & Docker Compose
- phpMyAdmin (Database Management)

### Frontend:
- Bootstrap 5
- DataTables (for tabular data management)
- SweetAlert (for alerts and notifications)
- FontAwesome (icons)

---

## Features

### ISSP Management
- Create, update, and manage ISSP submissions
- Structured workflow for submission and approval
- Status-based tracking of ISSP records

### Task Management
- Assign and monitor departmental tasks
- Track task progress in real time
- Organize tasks per ISSP entry

### Role-Based Access Control
- Administrator: Full system management and configuration
- Department Head: Review and approve submissions
- Employee: Encode and submit tasks and ISSP entries

### Reporting System
- Generate structured ISSP reports
- View consolidated data per department
- Export-ready reporting structure

### System Monitoring
- Activity logging for user actions
- System audit trail for accountability
- Notification system for updates and alerts

### Authentication & Access
- Password login/logout with CodeIgniter sessions stored in MySQL
- Role-based access control for administrator-only pages
- User and role management screens
- Google SSO support through OAuth 2.0 environment settings
- Default development administrator seeded from environment values

---

## System Architecture

The system follows a **Three-Tier Architecture**:

- **Presentation Layer** – Web UI built using Bootstrap 5
- **Application Layer** – CodeIgniter 4 handles business logic
- **Database Layer** – MySQL stores all system data

---

## Project Structure

```bash
issp-management-system/
├── backend/              # CodeIgniter 4 application (MVC)
│   ├── app/
│   ├── public/
│   ├── writable/
│   └── vendor/
│
├── database/             # SQL scripts and schema definitions
│
├── docker/               # Docker configuration files
│   ├── php/
│   └── apache/
│
│
├── docker-compose.yml    # Multi-container setup
├── .env.example          # Environment configuration template
└── README.md
```

---

## Local Auth Setup

Start the stack, run the identity migration, and seed the default roles/admin account:

```bash
docker compose up -d --build
docker compose exec app php spark migrate
docker compose exec app php spark db:seed AuthSeeder
```

Default development login:

- Email: `admin@issp.test`
- Password: `Admin@12345`

Override those values in `.env` with `SEED_ADMIN_EMAIL`, `SEED_ADMIN_PASSWORD`, and `SEED_ADMIN_NAME` before seeding.

For Google SSO, create OAuth credentials in Google Cloud and set:

```dotenv
SSO_GOOGLE_CLIENT_ID=
SSO_GOOGLE_CLIENT_SECRET=
SSO_GOOGLE_REDIRECT_URI=http://localhost:8080/auth/google/callback
SSO_GOOGLE_HOSTED_DOMAIN=
SSO_GOOGLE_ALLOWED_ROLES=admin,director_general,ict_planner,employee
```

Leave `SSO_GOOGLE_HOSTED_DOMAIN` empty to allow any Google account, or set it to your organization domain.
Leave `SSO_GOOGLE_ALLOWED_ROLES` empty to allow all existing roles, or list only the roles that may use Google sign-in.

Google Cloud setup:

1. Create or select a Google Cloud project.
2. Configure the OAuth consent screen.
3. Create OAuth credentials and choose `Web application`.
4. Add your redirect URI exactly as used by the app, for example `http://localhost:8080/auth/google/callback`.
5. Copy the client ID and client secret into `.env`.
6. Make sure the app URL in `app.baseURL` matches the site you are testing on.

The login flow uses the authorization code flow, so the redirect URI must match exactly or Google will reject the callback.
