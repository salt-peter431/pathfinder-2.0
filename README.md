# Pathfinder 2.0

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)](https://www.php.net/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-yellow)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![GitHub Repo](https://img.shields.io/badge/GitHub-Repo-green?logo=github)](https://github.com/salt-peter431/pfdr)
[![Maintenance](https://img.shields.io/endpoint?url=https://raw.githubusercontent.com/salt-peter431/pfdr/main/status.json&style=flat&label=Maintenance&message=${json:$.message}&color=${json:$.color})](https://github.com/salt-peter431/pfdr)
## Overview

Pathfinder 2.0 is a modernized rebuild of a custom order management system (OMS) originally developed in 2019 for a small printing business. The original Pathfinder handled customer data, order tracking, and document generation for print jobs. This version addresses legacy code issues, improving security, efficiency, and maintainability while preserving core functionality.

The system focuses on:
- **Customers**: Central records with contact info, tax status, billing, and order history (~2500 records).
- **Vendors**: Basic supplier directory for purchase orders (~40 vendors).
- **Orders**: Complex job building with variables (e.g., paper type, cutting, padding), pricing, and cloning for reorders (~150 orders/500 items per month; ~12,000 items total in DB).
- **Documents**: Auto-generated PDFs for invoices, job tickets, labels, POs, and packing lists using libraries like FPDF or TCPDF.

## Features

- **Dashboard**: Sortable/searchable table of active orders with actions (print, status update, edit).
- **Order Management**:
  - New orders with multi-item support and dynamic pricing.
  - Edit/view orders and quick jobs.
  - History cloning for repeat orders.
- **Customer & Vendor CRUD**: New/edit/view pages for accounts and suppliers.
- **Document Generation**: One-click PDFs for job bags (physical envelopes kept 10 years for reference).
- **Security**: Role-based access (4 users); no exposed ports.
- **Key Functions**: Automated pricing, PDF documentation, and record keeping tied to customer IDs.

## Tech Stack

- **Backend**: PHP (primary), Ajax for dynamic updates.
- **Frontend**: HTML, JavaScript (ES6+), based on [Skote Admin Template](https://themesbrand.com/skote-multi/docs/ultimate/index.html) for UI components.
- **Framework**: CodeIgniter (inferred from session handling; adaptable to Laravel).
- **Database**: MySQL (customer/vendor/order tables).
- **Other**: Cloudflare Access for auth; ProtonVPN for network security (per local config).

## Installation & Setup

This is a work-in-progress rebuild—**not ready for production**. For local development:

1. Clone the repo: `git clone https://github.com/salt-peter431/pfdr.git`
2. Install dependencies: `composer install` (if using Composer; adjust for your setup).
3. Configure `.env` (copy from `.env.example`): Set DB creds, app key, timezone (`America/New_York`).
4. Start local server: Use XAMPP (Apache/MySQL) at `http://localhost/pfdr`.
5. Access: Dashboard at `/` (login via Google Workspace simulation).

Test PDFs with sample orders. Review `writable/` for sessions/cache (ignored in Git).

## Usage

- **New Order**: Navigate to Order > New, build items with variables, generate docs.
- **Customer Lookup**: Search by account number, clone history.
- **Admin**: Vendor management and dashboard oversight.

See inline comments and `Overall-Concept.md` for architecture details.

## ⚠️ Important Warning

**This code is for personal development and learning only. It is NOT intended for production use, distribution, or deployment.** It contains placeholder data, untested features, and potential security gaps (e.g., from legacy migration). Do not fork, clone for commercial use, or rely on it for real business operations. Use at your own risk—back up your data!

## Contributing

No contributions accepted at this time (solo project). For questions, open an issue.

## License

MIT License—see [LICENSE](LICENSE) file. (Personal use encouraged for learning.)


---

*Built with ❤️ for efficient print shop workflows. Updated: September 28, 2025.*