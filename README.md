# Word Rain
Word Rain is a browser-based typing game designed to enhance your typing speed and accuracy. Inspired by the classic "Matrix" digital rain, this game challenges players to type falling words before they reach the bottom of the screen.
## Installation
1. Clone the Repository
```
git clone https://github.com/Sanjuu-20/word-rain.git
```
2. Set Up the Server
    * Place the cloned folder in your server's root directory (e.g., htdocs for XAMPP).
    * Start your local server.
3. Configure the Database
    * Create a new MySQL database (e.g., word_rain).
    * Import the database.sql and foruser.sql files to set up the necessary tables.
4. Update Database Connection
    * Open db.php.
    * Update the database credentials to match your local setup.
5. Run the Application
    * Navigate to ```http://localhost/word-rain/index```.html in your browser.

## Project Structure
```
word-rain/
├── database.sql         # SQL script to set up the main database
├── foruser.sql          # Additional SQL script for user-related tables
├── db.php               # Database connection script
├── get_scores.php       # Retrieves user scores
├── save_log.php         # Logs user activity
├── save_score.php       # Saves user scores
├── login.php            # Handles user login
├── signup.php           # Handles user registration
├── index.html           # Main game interface
├── words.txt            # List of words used in the game
├── p4.gif               # Game animation or visual asset
├── p5.gif               # Additional visual asset
└── icon.ico             # Favicon for the game
```

