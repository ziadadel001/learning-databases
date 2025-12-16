#  MongoDB Installation & Setup Guide

This document explains how to **install and set up MongoDB**, the MongoDB shell, and the VS Code extension for MongoDB.

---

##  Official Website

Visit MongoDB's official site to download software and resources:

[https://www.mongodb.com](https://www.mongodb.com)

---

##  Software Required

1. **MongoDB Server** (Community Edition)
2. **MongoDB Compass** (GUI for managing databases)
3. **MongoDB Shell** (`mongosh`) for command-line queries
4. **MongoDB VS Code Extension** (`MongoDB for VS Code`)

---

##  Installation Steps

### 1. Install MongoDB Server

1. Go to [MongoDB Community Download](https://www.mongodb.com/try/download/community)
2. Select your OS (Windows / macOS / Linux)
3. Download the installer and follow instructions
4. After installation, verify MongoDB is running:

```bash
mongosh
```

If the shell opens, MongoDB is running correctly.

---

### 2. Install MongoDB Compass

1. Go to [MongoDB Compass Download](https://www.mongodb.com/products/compass)
2. Download the version for your OS
3. Install and launch Compass
4. Use Compass to connect to `mongodb://localhost:27017`

---

### 3. Install MongoDB Shell (mongosh)

* On most installations, `mongosh` comes with MongoDB server.
* To verify:

```bash
mongosh --version
```

* You can also download separately from [MongoDB Shell](https://www.mongodb.com/try/download/shell)

---

### 4. Install VS Code Extension

* Open VS Code
* Go to Extensions (Ctrl+Shift+X)
* Search for **MongoDB for VS Code**
* Install it
* Connect to MongoDB via URI `mongodb://localhost:27017`

**Extension Link:** [MongoDB for VS Code](https://marketplace.visualstudio.com/items?itemName=mongodb.mongodb-vscode)

---

##  Summary

Once installed, you will have:

* MongoDB Server running locally
* MongoDB Compass for GUI management
* MongoDB Shell for CLI queries
* VS Code with MongoDB extension for direct interaction within your code editor

You are now ready to start learning and practicing MongoDB!
