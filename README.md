# Event Management System

## Login Credentials
Email: shraddha@example.com  
Password: 1234  

## Setup Instructions
1. Import `event_management.sql` into MySQL.
2. Update `config/db.php` with your database credentials.
3. Upload the project folder to the student server.
4. Access via: https://student.bicnepal.edu.np/~np02cs4a240023/

## Project Structure
event_management_system/
├── assets/
│   ├── app.js                 # JavaScript (Ajax, validation, autocomplete)
│   └── style.css              # CSS styling
├── config/
│   └── db.php                 # Database connection settings
├── includes/
│   ├── header.php             # Common header layout
│   ├── footer.php             # Common footer layout
│   └── functions.php          # Helper functions
├── public/
│   ├── login.php              # Login page
│   ├── logout.php             # Logout script
│   ├── index.php              # Dashboard / home page
│   ├── add_event.php          # Add new event form
│   ├── edit_event.php         # Edit existing event
│   ├── delete_event.php       # Ajax delete handler
│   ├── autocomplete.php       # Ajax autocomplete for search
│   ├── search_events.php      # Ajax search handler (events)
│   ├── search_attendees.php   # Ajax search handler (attendees)
│   ├── validate_event.php     # Ajax live validation (duplicate title check)
│   ├── register_attendee.php  # Register attendee to event
│   └── view_attendees.php     # View attendees list
├── README.md                  # Documentation
└── event_management.sql       # Database structure + sample data

## Features Implemented
- Login/Logout system with session management
- Event CRUD (Add, Edit, Delete, View)
- Attendees list (view-only)
- Search functionality across multiple fields:
	- In view events page, search can be done by Event and Location
	- In view attendees page, search can be done by Event, Name and Email
- Form validation Implemented:
	- Required field checks (HTML 'required' attribute)
	- PHP backend validation (empty fields, email format)
	- Ajax live validation
	- Security validation (htmlspecialchars, prepared statements)
- Ajax Features:
	- Autocomplete search suggestions 
	- Live search results without page reload
	- Delete events without reloading the page
	- Live form validation (e.g. checks if an event title already exists in the database using Ajax, giving instant feedback without page reload.)
- Consistent layout with header, footer and CSS styling

## Known Issues
- Attendees list is view-only (no edit/delete buttons)
- Search works across Event, Location, Name and Email but not by id and date
- Live validation only checks for duplicate event titles, not other inputs (though other inputs dont need validation checks for duplicate)
- Single-user login only
- Styling is basic and not fully responsive on smaller screens.
- Event deletion issue: 
	when an event is deleted but already has registered attendees, the event reappears after page refresh because of foreign key constraints or missing cascade delete logic.
