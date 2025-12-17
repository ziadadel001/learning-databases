# PostgreSQL Installation & Setup Guide

This document explains how to **install and set up PostgreSQL** and start using it immediately. PostgreSQL is very easy to set up and does **not require any additional tools** to start working.

---

## Overview

PostgreSQL is a powerful, open-source relational database management system (RDBMS). On Windows, installation is extremely straightforward: **download the installer, run it, and PostgreSQL is ready to use immediately**.

No extra services, extensions, or packages are required.

---

## Official Website

Download PostgreSQL from the official website:

🔗 [https://www.postgresql.org/download/windows/](https://www.postgresql.org/download/windows/)

---

## Software Included in the Installer

When you install PostgreSQL using the official installer, it already includes everything you need:

1. **PostgreSQL Server**
2. **pgAdmin** (GUI tool for managing databases)
3. **psql** (Command-line interface)
4. Required services and environment setup

 No additional downloads are required.

---

## Installation Steps (Windows)

1. Open the official PostgreSQL download page:
   [https://www.postgresql.org/download/windows/](https://www.postgresql.org/download/windows/)

2. Click **Download the installer** (EnterpriseDB installer)

3. Run the installer

4. Follow the setup wizard:

   * Choose installation directory
   * Set a password for the `postgres` user
   * Keep default port (`5432`)

5. Finish installation

 **That’s it! PostgreSQL is now fully installed and ready to use.**

---

## After Installation

Once installation is complete:

* PostgreSQL service runs automatically
* pgAdmin is installed and ready
* Default database `postgres` is created
* You can immediately start writing SQL queries

No configuration or extra setup is required.

---

## Accessing PostgreSQL

### Using pgAdmin (GUI)

1. Open **pgAdmin**
2. In the sidebar, expand:
   `Servers → PostgreSQL`
3. Enter the password you set during installation
4. Navigate to:
   `Databases → postgres`
5. Open **Query Tool** (Shortcut: `ALT + SHIFT + Q`)

### Using psql (CLI)

```bash
psql -U postgres
```

---

## Summary

* PostgreSQL installation is **very simple**
* Just download and run the installer from the official website
* Everything is included (Server, GUI, CLI)
* No extra packages or extensions needed
* PostgreSQL is ready to work immediately after installation

 You can now start using PostgreSQL for development and production.

---
