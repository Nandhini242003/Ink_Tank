<?php
// config.php - Database connection and session management

error_reporting(E_ALL); // Use E_ALL for development
ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables to hold connection details
$dbHost = '';
$dbUser = '';
$dbPass = '';
$dbName = '';
$sitepath = '';
$siteadminpath = '';

// Define the database credentials and site paths based on the server IP
$ip = $_SERVER["SERVER_ADDR"];

if ($ip == "::1" || $ip == "127.0.0.1") {
    date_default_timezone_set('Asia/Kolkata');
    $dbHost = "localhost";
    $dbName = "inktank_cms";
    $dbUser = "root";
    $dbPass = "";

    $sitepath = 'http://localhost/inktank_project/';
    $siteadminpath = 'http://localhost/inktank_project/admin/';
} else {
    // Live server configuration
    $dbHost = "localhost";
    $dbName = "uqdggrqf_inktank_cms";
    $dbUser = "uqdggrqf_inktank_user";
    $dbPass = "%kGRJ_=R3tes#H9!";

    $sitepath = 'https://sampletask.zerosoft.in/inktank_project/';
    $siteadminpath = 'https://sampletask.zerosoft.in/inktank_project/admin/';
}

// Class to handle database operations
class Database {
    private $conn;

    /**
     * @param string $host The database host.
     * @param string $user The database username.
     * @param string $pass The database password.
     * @param string $name The database name.
     */
    public function __construct($host, $user, $pass, $name) {
        $this->conn = new mysqli($host, $user, $pass, $name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * Executes a SELECT query and returns the results as an associative array.
     * @param string $sql The SQL query.
     * @param array $params An array of parameters for the prepared statement.
     * @return array The query results.
     */
    public function select_query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            // In a production environment, you would log this error, not die.
            error_log("Prepare failed: " . $this->conn->error . " in SQL: " . $sql);
            return [];
        }

        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
            }
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $stmt->close();
        return $data;
    }
    
    /**
     * Executes an INSERT, UPDATE, or DELETE query.
     * @param string $sql The SQL query.
     * @param array $params An array of parameters for the prepared statement.
     * @return int|bool The number of affected rows or false on failure.
     */
    public function update_query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error . " in SQL: " . $sql);
            return false;
        }

        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
            }
            $stmt->bind_param($types, ...$params);
        }

        $result = $stmt->execute();
        $affected_rows = $result ? $stmt->affected_rows : false;
        $stmt->close();
        return $affected_rows;
    }

    /**
     * Executes an INSERT query and returns the ID of the last inserted row.
     * @param string $sql The SQL query.
     * @param array $params An array of parameters for the prepared statement.
     * @return int|bool The ID of the last inserted row or false on failure.
     */
    public function insert_query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error . " in SQL: " . $sql);
            return false;
        }

        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
            }
            $stmt->bind_param($types, ...$params);
        }

        $result = $stmt->execute();
        $last_id = $result ? $this->conn->insert_id : false;
        $stmt->close();
        return $last_id;
    }
}

// Create a global database object
$db = new Database($dbHost, $dbUser, $dbPass, $dbName);

// --- Session Management Functions ---

/**
 * Checks if a user is currently logged in.
 * @return bool True if logged in, false otherwise.
 */
function isLoggedIn() {
    return isset($_SESSION['inktank_id']) && !empty($_SESSION['inktank_id']);
}

/**
 * Authenticates a user with a username and password.
 * This version uses secure password hashing.
 * @param string $username The username to check.
 * @param string $password The plaintext password.
 * @return bool True on successful login, false on failure.
 */
function login($username, $password) {
    global $db;

    $sql = "SELECT id, username, password FROM admin_users WHERE username = ?";
    $user_data = $db->select_query($sql, [$username]);
    
    if ($user_data && count($user_data) > 0) {
        $user_row = $user_data[0];
        
        if (password_verify($password, $user_row['password'])) {
            // Prevent session fixation attacks by regenerating the session ID
            session_regenerate_id(true);

            $_SESSION['inktank_id'] = $user_row['id'];
            $_SESSION['inktank_username'] = $user_row['username'];
            
            // Note: Your SQL dump is missing the 'last_login' column. Add it to the table for this line to work.
            $db->update_query("UPDATE admin_users SET last_login = NOW() WHERE id = ?", [$user_row['id']]);
            
            return true;
        }
    }
    
    return false;
}

/**
 * Logs out the current user by destroying the session.
 */
function logout() {
    unset($_SESSION['inktank_id']);
    unset($_SESSION['inktank_username']);
    session_destroy();
}

/**
 * Requires a user to be logged in to access the page.
 * Redirects to the login page if not authenticated.
 */
function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION["cms_status"] = "error";
        $_SESSION["cms_msg"] = "Please login now!";
        header('Location: login.php');
        exit();
    }
}

?>