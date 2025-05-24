<?php
session_start();
require_once("settings.php");
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
$message = "";

if (!$conn) {
    $message = "⚠️ Unable to connect to server. Please try again later.";
}

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['lockout_time'] = 0;
}

$locked_out = ($_SESSION['login_attempts'] >= 3 && time() < $_SESSION['lockout_time']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $conn) {
    
    if (isset($_POST['login']) && !$locked_out) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $query = "SELECT password_hash FROM managers WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password_hash'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['login_attempts'] = 0;
                header("Location: manage.php");
                exit();
            } else {
                $_SESSION['login_attempts']++;
                if ($_SESSION['login_attempts'] >= 3) {
                    $_SESSION['lockout_time'] = time() + 300;
                }
                $message = "❌ Incorrect password.";
            }
        } else {
            $_SESSION['login_attempts']++;
            if ($_SESSION['login_attempts'] >= 3) {
                $_SESSION['lockout_time'] = time() + 300;
            }
            $message = "❌ Username not found.";
        }
    }

    if (isset($_POST['register'])) {
        $username = trim($_POST['reg_username']);
        $password = $_POST['reg_password'];
        $confirm = $_POST['confirm_password'];

        if ($password !== $confirm) {
            $message = "❌ Passwords do not match.";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $message = "❌ Password must be at least 8 chars, include upper+lower case and number.";
        } else {
            $check = mysqli_prepare($conn, "SELECT * FROM managers WHERE username = ?");
            mysqli_stmt_bind_param($check, "s", $username);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);

            if (mysqli_stmt_num_rows($check) > 0) {
                $message = "❌ Username already exists.";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $insert = mysqli_prepare($conn, "INSERT INTO managers (username, password_hash) VALUES (?, ?)");
                mysqli_stmt_bind_param($insert, "ss", $username, $hashed);
                mysqli_stmt_execute($insert);
                $message = "✅ Registration successful. You may now login.";
            }
        }
    }
}
?>

<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<div class="manage-page-container">
    <div class="manage-search-section">
        <h2>Login</h2>
        <?php if ($locked_out): ?>
            <div class='center-message'>
                <p class='alert-msg'>❌ Too many failed attempts. Try again in 5 minutes.</p>
            </div>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" name="login" value="Login" class="manage-btn">
        </form>
    </div>

    <div class="manage-modify-section">
        <h2>Register</h2>
        <form method="post" action="login.php">
            <label for="reg_username">Username</label>
            <input type="text" name="reg_username" id="reg_username" required>
            <label for="reg_password">Password</label>
            <input type="password" name="reg_password" id="reg_password" required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="submit" name="register" value="Register" class="manage-btn">
        </form>
    </div>
</div>

<?php if (!empty($message)): ?>
    <div class='center-message'>
        <p class='alert-msg'><?= htmlspecialchars($message) ?></p>
    </div>
<?php endif; ?>

<?php include("footer.inc"); ?>
