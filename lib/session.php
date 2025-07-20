<?php
    class Session{
        // Start session
        public static function init(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
        
        // Set session value
        public static function set($key, $val){
            $_SESSION[$key] = $val; // Corrected
        }

        // Get session value
        public static function get($key){
            if (isset($_SESSION[$key])) { // Corrected
                return $_SESSION[$key];
            } else {
                return false;
            }
        }

        // Check session validity for admin login
        public static function checkSession(){
            self::init();
            if (self::get("login") == false) {
                self::destroy();
                header("Location:login.php");
                exit(); // Exit to prevent further code execution after the redirect
            }
        }

        // Redirect to dashboard if admin is already logged in
        public static function checklogin(){
            self::init();
            if (self::get("login") == true) {
                header("Location:index.php");
                exit(); // Exit to prevent further code execution after the redirect
            }
        }

        // Destroy session and log out the user
        public static function destroy(){
            session_destroy();
            echo "<script>window.location = 'login.php';</script>";
            exit(); // Exit to prevent further code execution
        }
    }
?>